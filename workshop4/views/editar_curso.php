<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body class="auth-page">

    <div class="login-card" style="max-width: 500px;">
        <h2>Editar Curso</h2>

        <form action="index.php?accion=guardarCurso" method="POST">

            <input type="hidden" name="operacion" value="editar">
            <input type="hidden" name="id" value="<?php echo (int)$curso['id']; ?>">

            <div class="form-group">
                <label for="codigo_curso" class="form-label">Código del Curso</label>
                <input type="text" class="form-control" id="codigo_curso" name="codigo_curso"
                       value="<?php echo htmlspecialchars($curso['codigo_curso']); ?>" required>
            </div>

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                       value="<?php echo htmlspecialchars($curso['nombre']); ?>" required>
            </div>

            <div class="form-group">
                <label for="id_carrera" class="form-label">ID de la Carrera</label>
                <input type="number" class="form-control" id="id_carrera" name="id_carrera"
                       value="<?php echo (int)$curso['id_carrera']; ?>" min="1" required>
            </div>

            <div class="form-group">
                <label for="creditos" class="form-label">Créditos</label>
                <input type="number" class="form-control" id="creditos" name="creditos"
                       value="<?php echo (int)$curso['creditos']; ?>" min="0" required>
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo htmlspecialchars($curso['descripcion'] ?? ''); ?></textarea>
            </div>

            <button type="submit" class="btn-submit">Guardar Cambios</button>

        </form>

        <div class="register-container">
            <a href="index.php?accion=cursos">Cancelar y Volver</a>
        </div>

    </div>

</body>
</html>