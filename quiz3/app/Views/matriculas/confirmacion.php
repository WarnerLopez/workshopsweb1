
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">

        <div class="alert alert-success">
            Matrícula realizada correctamente.
        </div>

        <h2>Datos de la Matrícula</h2>

        <table class="table table-bordered">

            <tr>
                <th>Número de matrícula</th>
                <td><?= esc($matricula['id']) ?></td>
            </tr>

            <tr>
                <th>Estudiante</th>
                <td><?= esc($matricula['nombre_estudiante']) ?></td>
            </tr>

            <tr>
                <th>Identificación</th>
                <td><?= esc($matricula['identificacion']) ?></td>
            </tr>

            <tr>
                <th>Curso</th>
                <td><?= esc($matricula['curso']) ?></td>
            </tr>

            <tr>
                <th>Código</th>
                <td><?= esc($matricula['codigo']) ?></td>
            </tr>

            <tr>
                <th>Créditos</th>
                <td><?= esc($matricula['creditos']) ?></td>
            </tr>

            <tr>
                <th>Fecha de matrícula</th>
                <td><?= esc($matricula['fecha_matricula']) ?></td>
            </tr>

        </table>

      <a href="<?= site_url('/') ?>" class="btn btn-primary">
    Nueva Matrícula
</a>

<a href="<?= site_url('cursos') ?>" class="btn btn-secondary">
    Gestionar Cursos
</a>

    </div>

</body>
</html>
