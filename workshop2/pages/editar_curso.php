<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
require_once '../utils/database.php';

if (!isset($_GET['id'])) {
    header("Location: cursos.php");
    exit();
}

$id_curso = intval($_GET['id']);
$sql = "SELECT * FROM cursos WHERE id = $id_curso";
$resultado = mysqli_query($conexion, $sql);
$curso = mysqli_fetch_assoc($resultado);

if (!$curso) {
    echo "El curso no existe.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="login-card" style="max-width: 500px;">
        <h2>Editar Curso</h2>
        
        <form action="../actions/editar_curso_action.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">

            <div class="form-group">
                <label for="codigo_curso" class="form-label">Código del Curso</label>
                <input type="text" class="form-control" id="codigo_curso" name="codigo_curso" value="<?php echo htmlspecialchars($curso['codigo_curso']); ?>" required>
            </div>

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($curso['nombre']); ?>" required>
            </div>

            <div class="form-group">
                <label for="id_carrera" class="form-label">ID de la Carrera</label>
                <input type="number" class="form-control" id="id_carrera" name="id_carrera" value="<?php echo htmlspecialchars($curso['id_carrera']); ?>" required>
            </div>

            <div class="form-group">
                <label for="creditos" class="form-label">Créditos</label>
                <input type="number" class="form-control" id="creditos" name="creditos" value="<?php echo htmlspecialchars($curso['creditos']); ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción del Curso</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" style="resize:none;"><?php echo htmlspecialchars($curso['descripcion']); ?></textarea>
            </div>
            
            <button type="submit" class="btn-submit">Guardar Cambios</button>
        </form>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="cursos.php" style="color: var(--text-muted); text-decoration: none; font-size: 14px;">Cancelar y Volver</a>
        </div>
    </div>
</body>
</html>
