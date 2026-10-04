<?php
session_start();

$host = "localhost";
$usuario_db = "root";
$password_db = "";
$nombre_db = "login_workshop"; 

// Crear la conexión
$conexion = mysqli_connect($host, $usuario_db, $password_db, $nombre_db);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

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
            
            echo "¡Inicio de sesión exitoso!";
             header("Location: menu.php");
            
        } else {
             $_SESSION['error_login'] = "Credenciales inválidas.";
            header("Location: index.php");
            exit();
        }
    } else {
         $_SESSION['error_login'] = "Credenciales inválidas.";
        header("Location: index.php");
        exit();
    }
}

mysqli_close($conexion);
?>
