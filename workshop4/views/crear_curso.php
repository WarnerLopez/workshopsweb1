<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body class="auth-page">

    <div class="login-card" style="max-width: 500px;">
        <h2>Crear Nuevo Curso</h2>

        <form action="index.php?accion=guardarCurso" method="POST">

            <input type="hidden" name="operacion" value="crear">

            <div class="form-group">
                <label class="form-label">Código del Curso</label>
                <input type="text" class="form-control" name="codigo_curso" required>
            </div>

            <div class="form-group">
                <label class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="form-group">
                <label class="form-label">ID de la Carrera</label>
                <input type="number" class="form-control" name="id_carrera" min="1" required>
            </div>

            <div class="form-group">
                <label class="form-label">Créditos</label>
                <input type="number" class="form-control" name="creditos" min="0" required>
            </div>

            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3"></textarea>
            </div>

            <button type="submit" class="btn-submit">Crear Curso</button>

        </form>

        <div class="register-container">
            <a href="index.php?accion=cursos">← Volver al Listado</a>
        </div>

    </div>

</body>
</html>