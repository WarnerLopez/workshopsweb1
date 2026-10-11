<?php
session_start();
session_unset(); // Limpia todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirige al formulario de login
header("Location: ../index.php");
exit();
?>