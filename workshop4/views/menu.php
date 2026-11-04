<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body class="page-body">

    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="nav-logo">Sistema Académico</div>

        <div class="nav-links">
            <a href="index.php?accion=menu" class="active">Inicio</a>
            <a href="index.php?accion=cursos">Cursos</a>
            <a href="index.php?accion=perfil">Mi Perfil</a>
            <a href="index.php?accion=salir" class="nav-logout">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="login-card" style="margin: 0 auto; max-width: 450px;">

        <h2>¡Inicio de sesión exitoso!</h2>

        <p style="text-align: center; margin-bottom: 25px;">
            Sesión activa de:
            <strong>
                <?php echo htmlspecialchars($_SESSION['usuario_name']); ?>
            </strong>
        </p>

        <a href="index.php?accion=cursos" class="btn-submit">
            Ir a Sección Cursos
        </a>

    </div>

</body>
</html>
