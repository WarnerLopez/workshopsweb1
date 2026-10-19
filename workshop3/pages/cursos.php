<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
require_once '../utils/database.php';

$sql = "SELECT * FROM cursos ORDER BY id DESC";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="page-body">

    <!-- Navbar unificada -->
    <nav class="navbar">
        <div class="nav-logo">Sistema Académico</div>
        <div class="nav-links">
            <a href="menu.php">Inicio</a>
            <a href="cursos.php" class="active">Cursos</a>
            <a href="perfil.php">Mi Perfil</a>
            <a href="../actions/logout.php" class="nav-logout">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- AQUÍ ESTÁ EL CONTENEDOR CORREGIDO CON EL MARGEN AUTOMÁTICO -->
    <div class="content-container" style="margin: 0 auto;">
        <div class="header-section">
            <h2>Listado de Cursos</h2>
            <a href="crear_curso.php" class="btn-inline">+ Crear Curso</a>
        </div>

        <?php if(isset($_GET['msg'])): ?>
            <div class="alert-success">
                <?php 
                    if($_GET['msg'] == 'creado') echo "¡Curso creado exitosamente!";
                    if($_GET['msg'] == 'actualizado') echo "¡Curso actualizado exitosamente!";
                    if($_GET['msg'] == 'eliminado') echo "¡Curso eliminado correctamente!";
                ?>
            </div>
        <?php endif; ?>

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
                <?php if(mysqli_num_rows($resultado) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($row['codigo_curso']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['id_carrera']); ?></td>
                            <td><?php echo htmlspecialchars($row['creditos']); ?></td>
                            <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                            <td class="actions-cell">
                                <a href="editar_curso.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Editar</a>
                                
                                <form action="../actions/delete_course_action.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este curso?');" style="margin:0;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn-action btn-delete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--text-muted);">No hay cursos registrados actualmente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
<?php mysqli_close($conexion); ?>
