<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body class="auth-page">

    <div class="login-card">
        <h2>Iniciar Sesión</h2>

        <!-- Mensaje de error al iniciar sesión -->
        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($_SESSION['error_login']); ?>
            </div>

            <?php unset($_SESSION['error_login']); ?>
        <?php endif; ?>

        <!-- Mensaje de registro exitoso -->
        <?php if (isset($_GET['registro'])): ?>
            <div class="alert-success">
                ¡Cuenta creada correctamente!
            </div>
        <?php endif; ?>

        <!-- Formulario de inicio de sesión -->
        <form action="index.php?accion=iniciarSesion" method="POST">

            <div class="form-group">
                <label class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button type="submit" class="btn-submit">Ingresar</button>

        </form>

        <!-- Enlace para registrarse -->
        <div class="register-container">
            <p>¿No tienes una cuenta?</p>
            <a href="index.php?accion=registro">Registrarse</a>
        </div>

    </div>

</body>
</html>