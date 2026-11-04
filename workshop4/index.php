<?php

session_start();

// Conexión a la base de datos
require_once __DIR__ . '/config/database.php';

// Controladores
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/CursoController.php';
require_once __DIR__ . '/controllers/PerfilController.php';

// Obtener la acción solicitada
$accion = $_GET['accion'] ?? 'login';

// Acciones de autenticación
if ($accion === 'login') {
    mostrarLogin();
    exit;
}

if ($accion === 'registro') {
    mostrarRegistro($conexion);
    exit;
}

if ($accion === 'iniciarSesion') {
    iniciarSesion($conexion);
    exit;
}

if ($accion === 'registrarCuenta') {
    registrarCuenta($conexion);
    exit;
}

if ($accion === 'salir') {
    cerrarSesion();
    exit;
}

// Verificar que el usuario haya iniciado sesión
if (empty($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

// Acciones disponibles después de iniciar sesión
switch ($accion) {

    case 'menu':
        require __DIR__ . '/views/menu.php';
        break;

    case 'cursos':
        listarCursos($conexion);
        break;

    case 'crearCurso':
        mostrarCrearCurso();
        break;

    case 'editarCurso':
        mostrarEditarCurso($conexion);
        break;

    case 'guardarCurso':
        guardarCurso($conexion);
        break;

    case 'eliminarCurso':
        borrarCurso($conexion);
        break;

    case 'perfil':
        mostrarPerfil($conexion);
        break;

    case 'guardarPerfil':
        guardarPerfil($conexion);
        break;

    default:
        http_response_code(404);
        echo 'Página no encontrada.';
        break;
}