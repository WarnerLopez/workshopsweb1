
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">

        <h2 class="mb-4">Editar Curso</h2>

        <form action="<?= site_url('cursos/actualizar/' . $curso['id']) ?>" method="POST">

            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Nombre del Curso</label>
                <input type="text" name="nombre" class="form-control"
                       value="<?= esc($curso['nombre']) ?>" maxlength="100" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Código del Curso</label>
                <input type="text" name="codigo" class="form-control"
                       value="<?= esc($curso['codigo']) ?>" maxlength="20" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad de Créditos</label>
                <input type="number" name="creditos" class="form-control"
                       value="<?= esc($curso['creditos']) ?>" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Carrera</label>

                <select name="carrera_id" class="form-select" required>

                    <?php foreach ($carreras as $carrera): ?>

                        <option value="<?= esc($carrera['id']) ?>"
                            <?= $curso['carrera_id'] == $carrera['id'] ? 'selected' : '' ?>>

                            <?= esc($carrera['nombre']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Actualizar Curso
            </button>

            <a href="<?= site_url('cursos') ?>" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</body>
</html>
