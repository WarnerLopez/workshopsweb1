<?php
function buscarUsuario($conexion, $correo) {
    $correo = mysqli_real_escape_string($conexion, $correo);
    $resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$correo' LIMIT 1");
    return $resultado ? mysqli_fetch_assoc($resultado) : null;
}
function obtenerUsuario($conexion, $id) {
    $id = intval($id);
    $resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id = $id");
    return $resultado ? mysqli_fetch_assoc($resultado) : null;
}
function registrarUsuario($conexion, $correo, $password, $provincia) {
    $correo = mysqli_real_escape_string($conexion, $correo);
    $hash = mysqli_real_escape_string($conexion, password_hash($password, PASSWORD_DEFAULT));
    $provincia = intval($provincia);
    return mysqli_query($conexion, "INSERT INTO usuarios (usuario, password, provincia_id) VALUES ('$correo', '$hash', $provincia)");
}
function actualizarUsuario($conexion, $id, $correo, $provincia, $password) {
    $id = intval($id);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $provincia = intval($provincia);
    $sql = "UPDATE usuarios SET usuario = '$correo', provincia_id = $provincia";
    if ($password !== '') {
        $hash = mysqli_real_escape_string($conexion, password_hash($password, PASSWORD_DEFAULT));
        $sql .= ", password = '$hash'";
    }
    $sql .= " WHERE id = $id";
    return mysqli_query($conexion, $sql);
}
