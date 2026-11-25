<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">

        <h2 class="mb-4">Gestión de Cursos</h2>


<?php if (session()->getFlashdata('mensaje')): ?>

    <div class="alert alert-success">
        <?= esc(session()->getFlashdata('mensaje')) ?>
    </div>

<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>

    <div class="alert alert-danger">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>

<?php endif; ?>


       <a href="<?= site_url('cursos/crear') ?>" class="btn btn-primary mb-3">
    Nuevo Curso
</a>

<a href="<?= site_url('/') ?>" class="btn btn-secondary mb-3">
    Volver a Matrícula
</a>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre del Curso</th>
                    <th>Código</th>
                    <th>Créditos</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($cursos as $curso): ?>

                    <tr>
                        <td><?= esc($curso['id']) ?></td>
                        <td><?= esc($curso['nombre']) ?></td>
                        <td><?= esc($curso['codigo']) ?></td>
                        <td><?= esc($curso['creditos']) ?></td>
                        <td><?= esc($curso['carrera']) ?></td>

                        <td>
                            <a href="<?= site_url('cursos/editar/' . $curso['id']) ?>"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="<?= site_url('cursos/eliminar/' . $curso['id']) ?>"
                                  method="POST" class="d-inline">

                                <?= csrf_field() ?>

                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Desea eliminar este curso?')">
                                    Eliminar
                                </button>

                            </form>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</body>
</html>
