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
<body class="page-body">

    <!-- Barra de navegación superior fija -->
    <nav class="navbar">
        <div class="nav-logo">Sistema Académico</div>
        <div class="nav-links">
            <a href="menu.php" class="active">Inicio</a>
            <a href="cursos.php">Cursos</a>
            <a href="perfil.php">Mi Perfil</a>
            <a href="../actions/logout.php" class="nav-logout">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Tarjeta de bienvenida centrada correctamente con margen automático -->
    <div class="login-card" style="max-width: 450px; margin: 0 auto;">
        <h2>¡Inicio de sesión exitoso!</h2>
        
        <div class="form-group" style="text-align: center; margin-bottom: 25px;">
            <p class="form-label" style="font-size: 16px;">Sesión activa de:</p>
            <p style="color: var(--text-main); font-size: 18px; font-weight: 600;">
                <?php echo htmlspecialchars($_SESSION['usuario_name']); ?>
            </p>
        </div>

        <a href="cursos.php" class="btn-submit">
            Ir a Sección Cursos
        </a>
    </div>

</body>
</html>
