<?php
session_start();

require_once '../utils/database.php';

// Verificar que los datos llegaron por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe 'email' desde el HTML y lo limpia
    $email_form = mysqli_real_escape_string($conexion, $_POST['email']);
    $password_form = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$email_form'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $usuario_data = mysqli_fetch_assoc($resultado);

        // Verifica la contraseña
        if (password_verify($password_form, $usuario_data['password']) || $password_form == $usuario_data['password']) {
            $_SESSION['usuario_id'] = $usuario_data['id'] ?? null;
            $_SESSION['usuario_name'] = $usuario_data['usuario'];
            
            // Redirige al menú principal (Línea 23 corregida)
            header("Location: ../pages/menu.php");
            exit(); 
        } else {
            $_SESSION['error_login'] = "Credenciales inválidas.";
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['error_login'] = "Credenciales inválidas.";
        header("Location: ../index.php");
        exit();
    }
}

mysqli_close($conexion);
?>

