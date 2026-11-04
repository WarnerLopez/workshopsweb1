<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Provincia.php';
function mostrarLogin() { require __DIR__ . '/../views/login.php'; }
function mostrarRegistro($conexion) {
    $provincias = obtenerProvincias($conexion);
    require __DIR__ . '/../views/register.php';
}
function iniciarSesion($conexion) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }
    $correo = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $usuario = buscarUsuario($conexion, $correo);
    if ($usuario && password_verify($password, $usuario['password'])) {
        session_regenerate_id(true);
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_name'] = $usuario['usuario'];
        header('Location: index.php?accion=menu'); exit;
    }
    $_SESSION['error_login'] = 'Credenciales inválidas.';
    header('Location: index.php'); exit;
}
function registrarCuenta($conexion) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php?accion=registro'); exit; }
    $correo = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $provincia = intval($_POST['provincia_id'] ?? 0);
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($password) < 6 || !existeProvincia($conexion, $provincia)) {
        $_SESSION['error_registro'] = 'Revisa el correo, la provincia y la contraseña (mínimo 6 caracteres).';
        header('Location: index.php?accion=registro'); exit;
    }
    if (registrarUsuario($conexion, $correo, $password, $provincia)) {
        header('Location: index.php?registro=exito'); exit;
    }
    $_SESSION['error_registro'] = 'No se pudo registrar. Comprueba que el correo no exista.';
    header('Location: index.php?accion=registro'); exit;
}
function cerrarSesion() {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php'); exit;
}
