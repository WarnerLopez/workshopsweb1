<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="login-card" style="max-width: 450px;">
        <h2>¡Inicio de sesión exitoso!</h2>
        
        <div class="form-group" style="text-align: center; margin-bottom: 25px;">
            <p class="form-label" style="font-size: 16px;">Sesión activa de:</p>
            <p style="color: var(--text-main); font-size: 18px; font-weight: 600;">
                <?php echo htmlspecialchars($_SESSION['usuario_name']); ?>
            </p>
        </div>

        <!-- Botón para ir al Perfil / Modificar datos -->
        <a href="perfil.php" class="btn-submit btn-logout" style="background-color: var(--primary-color); margin-bottom: 12px;">
            Mi Perfil (Modificar Datos)
        </a>

        <!-- Botón de Cerrar Sesión -->
        <a href="../actions/logout.php" class="btn-submit btn-logout" style="background-color: #ef4444;">
            Cerrar Sesión
        </a>
    </div>
</body>
</html>

