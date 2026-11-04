<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body class="auth-page">

    <div class="login-card">
        <h2>Registrarse</h2>

        <!-- Mensaje de error al registrarse -->
        <?php if (isset($_SESSION['error_registro'])): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($_SESSION['error_registro']); ?>
            </div>

            <?php unset($_SESSION['error_registro']); ?>
        <?php endif; ?>

        <!-- Formulario de registro -->
        <form action="index.php?accion=registrarCuenta" method="POST">

            <div class="form-group">
                <label class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label class="form-label">Contraseña (mínimo 6 caracteres)</label>
                <input type="password" class="form-control" name="password" minlength="6" required>
            </div>

            <div class="form-group">
                <label class="form-label">Provincia</label>

                <select class="form-control" name="provincia_id" required>
                    <option value="">Seleccione una provincia</option>

                    <?php while ($fila = mysqli_fetch_assoc($provincias)): ?>
                        <option value="<?php echo (int)$fila['id']; ?>">
                            <?php echo htmlspecialchars($fila['nombre']); ?>
                        </option>
                    <?php endwhile; ?>

                </select>
            </div>

            <button type="submit" class="btn-submit">Crear Cuenta</button>

        </form>

        <!-- Enlace para iniciar sesión -->
        <div class="register-container">
            <a href="index.php">¿Ya tienes cuenta? Inicia sesión</a>
        </div>

    </div>

</body>
</html>