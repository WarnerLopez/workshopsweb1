<?php
// Iniciar sesión para poder leer si hay errores guardados
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
     <link rel="stylesheet" href="styles.css">
</head>
<body >


    <div class="login-card">
        <h2>Iniciar Sesión</h2>


        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="alert-error">
                <?php 
                    echo $_SESSION['error_login']; 
                    unset($_SESSION['error_login']); // Borra el mensaje para que no aparezca al recargar
                ?>
            </div>
        <?php endif; ?>


        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nombre@correo.com" required>
               
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                
            </div>
            
            <label class="form-check" for="remember">
                <input type="checkbox" id="remember">
                <span>Recordar datos</span>
            </label>
            
            <button type="submit" class="btn-submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
