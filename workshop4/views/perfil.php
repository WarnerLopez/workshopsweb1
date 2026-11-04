<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body class="auth-page">

    <div class="login-card">
        <h2>Modificar Perfil</h2>

        <!-- Mensaje de actualización exitosa -->
        <?php if (isset($_GET['actualizado'])): ?>
            <div class="alert-success">
                ¡Datos actualizados correctamente!
            </div>
        <?php endif; ?>

        <!-- Formulario para modificar el perfil -->
        <form action="index.php?accion=guardarPerfil" method="POST">

            <div class="form-group">
                <label class="form-label">Correo electrónico</label>

                <input
                    type="email"
                    class="form-control"
                    name="email"
                    value="<?php echo htmlspecialchars($usuario['usuario']); ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label">
                    Nueva contraseña (dejar en blanco para no cambiar)
                </label>

                <input
                    type="password"
                    class="form-control"
                    name="password"
                    minlength="6"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Provincia</label>

                <select class="form-control" name="provincia_id" required>

                    <?php while ($fila = mysqli_fetch_assoc($provincias)): ?>

                        <option
                            value="<?php echo (int)$fila['id']; ?>"
                            <?php if ($fila['id'] == $usuario['provincia_id']) echo 'selected'; ?>
                        >
                            <?php echo htmlspecialchars($fila['nombre']); ?>
                        </option>

                    <?php endwhile; ?>

                </select>
            </div>

            <button type="submit" class="btn-submit">
                Guardar Cambios
            </button>

        </form>

        <!-- Enlace para volver al menú -->
        <div class="register-container">
            <a href="index.php?accion=menu">← Volver al Menú</a>
        </div>

    </div>

</body>
</html>
