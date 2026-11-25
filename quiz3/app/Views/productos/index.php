
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Gestión de Productos</h2>

    <a href="#" class="btn btn-primary mb-3">
        + Nuevo Producto
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= esc($producto['id']) ?></td>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td><?= esc($producto['descripcion']) ?></td>
                    <td><?= esc($producto['precio']) ?></td>
                    <td><?= esc($producto['cantidad']) ?></td>

                    <td>
                        <a href="#" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <a href="#" class="btn btn-danger btn-sm">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</body>
</html>
