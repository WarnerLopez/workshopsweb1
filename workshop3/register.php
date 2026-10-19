<?php
require_once 'utils/database.php';

// Obtener las provincias para el dropdown
$sql_prov = "SELECT * FROM provincias";
$res_prov = mysqli_query($conexion, $sql_prov);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="auth-page">

    <div class="login-card">
        <h2>Registrarse</h2>
        
        <form action="actions/register_action.php" method="POST">
            <div class="form-group">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="provincia" class="form-label">Provincia</label>
                <select class="form-control" id="provincia" name="provincia_id" required>
                    <option value="">Seleccione una provincia</option>
                    <?php while($row = mysqli_fetch_assoc($res_prov)): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                    <?php endwhile; ?> 
                </select>
            </div>
            
            <button type="submit" class="btn-submit">Crear Cuenta</button>
        </form>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="index.php" style="color: var(--primary-color); text-decoration: none; font-size: 14px;">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</body>
</html>
