<?php
require_once '../utils/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password_raw = $_POST['password'];
    $provincia_id = intval($_POST['provincia_id']);
    
    // Encriptar contraseña de forma segura
    $password_segura = password_hash($password_raw, PASSWORD_BCRYPT);
    
    // Insertar en la tabla usuarios
    $sql = "INSERT INTO usuarios (usuario, password, provincia_id) VALUES ('$email', '$password_segura', $provincia_id)";
    
    if (mysqli_query($conexion, $sql)) {
        header("Location: ../index.php?registro=exito");
    } else {
        echo "Error al registrar: " . mysqli_error($conexion);
    }
}
mysqli_close($conexion);
?>
