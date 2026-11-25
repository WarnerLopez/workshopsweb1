
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matrícula de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">

        <h2>Matrícula de Estudiantes</h2>

        <a href="<?= site_url('cursos') ?>" class="btn btn-primary mb-4">
            Gestionar Cursos
        </a>

        <form action="<?= site_url('matriculas/guardar') ?>" method="POST">

            <?= csrf_field() ?>

            <div class="mb-3">
                <label>Nombre del Estudiante</label>
                <input type="text" name="nombre_estudiante"
                       class="form-control" maxlength="100" required>
            </div>

            <div class="mb-3">
                <label>Identificación</label>
                <input type="text" name="identificacion"
                       class="form-control" maxlength="20" required>
            </div>

            <div class="mb-3">
                <label>Curso</label>

                <select name="curso_id" class="form-select" required>

                    <option value="">Seleccione un curso</option>

                    <?php foreach ($cursos as $curso): ?>

                        <option value="<?= esc($curso['id']) ?>">
                            <?= esc($curso['codigo']) ?> -
                            <?= esc($curso['nombre']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Matricular
            </button>

        </form>

    </div>

</body>
</html>
