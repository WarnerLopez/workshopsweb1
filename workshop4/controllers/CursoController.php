<?php
require_once __DIR__ . '/../models/Curso.php';
function listarCursos($conexion) {
    $resultado = obtenerCursos($conexion);
    require __DIR__ . '/../views/cursos.php';
}
function mostrarCrearCurso() { require __DIR__ . '/../views/crear_curso.php'; }
function mostrarEditarCurso($conexion) {
    $curso = obtenerCurso($conexion, $_GET['id'] ?? 0);
    if (!$curso) { http_response_code(404); echo 'El curso no existe.'; return; }
    require __DIR__ . '/../views/editar_curso.php';
}
function guardarCurso($conexion) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php?accion=cursos'); exit; }
    $codigo = trim($_POST['codigo_curso'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $carrera = intval($_POST['id_carrera'] ?? 0);
    $creditos = intval($_POST['creditos'] ?? -1);
    $descripcion = trim($_POST['descripcion'] ?? '');
    if ($codigo === '' || $nombre === '' || $carrera <= 0 || $creditos < 0) { http_response_code(400); echo 'Datos del curso inválidos.'; return; }
    $accion = $_POST['operacion'] ?? '';
    if ($accion === 'crear') {
        $ok = crearCurso($conexion, $codigo, $nombre, $carrera, $creditos, $descripcion);
        $msg = 'creado';
    } elseif ($accion === 'editar') {
        $id = intval($_POST['id'] ?? 0);
        if ($id <= 0 || !obtenerCurso($conexion, $id)) { http_response_code(404); echo 'Curso no encontrado.'; return; }
        $ok = actualizarCurso($conexion, $id, $codigo, $nombre, $carrera, $creditos, $descripcion);
        $msg = 'actualizado';
    } else { http_response_code(400); echo 'Operación inválida.'; return; }
    if (!$ok) { http_response_code(500); echo 'No se pudo guardar el curso.'; return; }
    header('Location: index.php?accion=cursos&msg=' . $msg); exit;
}
function borrarCurso($conexion) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php?accion=cursos'); exit; }
    $id = intval($_POST['id'] ?? 0);
    if ($id <= 0 || !obtenerCurso($conexion, $id)) { http_response_code(404); echo 'Curso no encontrado.'; return; }
    if (!eliminarCurso($conexion, $id)) { http_response_code(500); echo 'No se pudo eliminar el curso.'; return; }
    header('Location: index.php?accion=cursos&msg=eliminado'); exit;
}
