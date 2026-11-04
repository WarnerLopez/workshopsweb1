```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body class="page-body">

    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="nav-logo">Sistema Académico</div>

        <div class="nav-links">
            <a href="index.php?accion=menu">Inicio</a>
            <a href="index.php?accion=cursos" class="active">Cursos</a>
            <a href="index.php?accion=perfil">Mi Perfil</a>
            <a href="index.php?accion=salir" class="nav-logout">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="content-container" style="margin: 0 auto;">

        <div class="header-section">
            <h2>Listado de Cursos</h2>
            <a href="index.php?accion=crearCurso" class="btn-inline">+ Crear Curso</a>
        </div>

        <!-- Mensajes de confirmación -->
        <?php
            $mensajes = [
                'creado' => '¡Curso creado exitosamente!',
                'actualizado' => '¡Curso actualizado exitosamente!',
                'eliminado' => '¡Curso eliminado correctamente!'
            ];

            $msg = $_GET['msg'] ?? '';
        ?>

        <?php if (isset($mensajes[$msg])): ?>
            <div class="alert-success">
                <?php echo $mensajes[$msg]; ?>
            </div>
        <?php endif; ?>

        <!-- Tabla de cursos -->
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>ID Carrera</th>
                    <th>Créditos</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

                    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($fila['codigo_curso']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($fila['nombre']); ?>
                            </td>

                            <td>
                                <?php echo (int)$fila['id_carrera']; ?>
                            </td>

                            <td>
                                <?php echo (int)$fila['creditos']; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($fila['descripcion'] ?? ''); ?>
                            </td>

                            <td class="actions-cell">

                                <!-- Botón editar -->
                                <a href="index.php?accion=editarCurso&id=<?php echo (int)$fila['id']; ?>"
                                   class="btn-action btn-edit">
                                    Editar
                                </a>

                                <!-- Botón eliminar -->
                                <form action="index.php?accion=eliminarCurso"
                                      method="POST"
                                      onsubmit="return confirm('¿Eliminar este curso?')">

                                    <input type="hidden"
                                           name="id"
                                           value="<?php echo (int)$fila['id']; ?>">

                                    <button type="submit" class="btn-action btn-delete">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endwhile; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">
                            No hay cursos registrados actualmente.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</body>
</html>
```