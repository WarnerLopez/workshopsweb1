<?php
session_start();
require_once '../utils/database.php';

// Validar que exista una sesión activa
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

$id_usuario = $_SESSION['usuario_id'];

// 1. Obtener los datos actuales del usuario de la BD
$sql_user = "SELECT * FROM usuarios WHERE id = $id_usuario";
$res_user = mysqli_query($conexion, $sql_user);
$user_data = mysqli_fetch_assoc($res_user);

// 2. Obtener todas las provincias para el dropdown
$sql_prov = "SELECT * FROM provincias";
$res_prov = mysqli_query($conexion, $sql_prov);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="page-body">

    <div class="login-card">
        <h2>Modificar Perfil</h2>

        <!-- Alerta de éxito opcional si se actualizan los datos -->
        <?php if(isset($_GET['actualizado'])): ?>
            <div class="alert-error" style="background-color: #d1e7dd; color: #0f5132; border-color: #badbcc;">
                ¡Datos actualizados correctamente!
            </div>
        <?php endif; ?>
        
        <form action="../actions/update_profile.php" method="POST">
            <div class="form-group">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?php echo htmlspecialchars($user_data['usuario']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********">
            </div>
            
            <div class="form-group">
                <label for="provincia" class="form-label">Provincia</label>
                <select class="form-control" id="provincia" name="provincia_id" required>
                    <?php while($row = mysqli_fetch_assoc($res_prov)): ?>
                        
                        <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $user_data['provincia_id']) ? 'selected' : ''; ?>>
                            <?php echo $row['nombre']; ?>
                        </option>
                    <?php endwhile; ?> 
                </select>
            </div>
            
            <button type="submit" class="btn-submit">Guardar Cambios</button>
        </form>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="menu.php" style="color: var(--text-muted); text-decoration: none; font-size: 14px;">← Volver al Menú</a>
        </div>
    </div>
</body>
</html>
