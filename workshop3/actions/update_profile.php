<?php
session_start();
require_once '../utils/database.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['usuario_id'];
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $provincia_id = intval($_POST['provincia_id']);
    $password_raw = $_POST['password'];
    
    // Base de la consulta SQL
    $sql = "UPDATE usuarios SET usuario = '$email', provincia_id = $provincia_id";
    
    // Si el usuario escribió una nueva contraseña, la encriptamos y la agregamos al SQL
    if (!empty($password_raw)) {
        $password_segura = password_hash($password_raw, PASSWORD_BCRYPT);
        $sql .= ", password = '$password_segura'";
    }
    
    $sql .= " WHERE id = $id_usuario";
    
    if (mysqli_query($conexion, $sql)) {
        // Actualizar las variables de sesión en tiempo real
        $_SESSION['usuario_name'] = $email;
        
        header("Location: ../pages/perfil.php?actualizado=1");
        exit();
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
mysqli_close($conexion);
?>
