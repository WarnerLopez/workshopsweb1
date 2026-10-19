<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Curso</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="login-card" style="max-width: 500px;">
        <h2>Crear Nuevo Curso</h2>
        
        <form action="../actions/crear_curso_action.php" method="POST">
            <div class="form-group">
                <label for="codigo_curso" class="form-label">Código del Curso</label>
                <input type="text" class="form-control" id="codigo_curso" name="codigo_curso" required placeholder="Ej: IF-4000">
            </div>

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ej: Desarrollo Web 2">
            </div>

            <div class="form-group">
                <label for="id_carrera" class="form-label">ID de la Carrera</label>
                <input type="number" class="form-control" id="id_carrera" name="id_carrera" required placeholder="Ej: 105">
            </div>

            <div class="form-group">
                <label for="creditos" class="form-label">Créditos</label>
                <input type="number" class="form-control" id="creditos" name="creditos" required placeholder="Ej: 4">
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción del Curso</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" style="resize:none;" placeholder="Breve descripción del programa..."></textarea>
            </div>
            
            <button type="submit" class="btn-submit">Crear Curso</button>
        </form>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="cursos.php" style="color: var(--text-muted); text-decoration: none; font-size: 14px;">← Volver al Listado</a>
        </div>
    </div>
</body>
</html>
