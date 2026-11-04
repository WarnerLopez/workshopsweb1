<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Provincia.php';
function mostrarPerfil($conexion) {
    $usuario = obtenerUsuario($conexion, $_SESSION['usuario_id']);
    $provincias = obtenerProvincias($conexion);
    if (!$usuario) { http_response_code(404); echo 'Usuario no encontrado.'; return; }
    require __DIR__ . '/../views/perfil.php';
}
function guardarPerfil($conexion) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php?accion=perfil'); exit; }
    $correo = trim($_POST['email'] ?? '');
    $provincia = intval($_POST['provincia_id'] ?? 0);
    $password = $_POST['password'] ?? '';
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || !existeProvincia($conexion, $provincia) || ($password !== '' && strlen($password) < 6)) {
        http_response_code(400); echo 'Datos del perfil inválidos.'; return;
    }
    if (!actualizarUsuario($conexion, $_SESSION['usuario_id'], $correo, $provincia, $password)) {
        http_response_code(500); echo 'No se pudo actualizar el perfil.'; return;
    }
    $_SESSION['usuario_name'] = $correo;
    header('Location: index.php?accion=perfil&actualizado=1'); exit;
}
