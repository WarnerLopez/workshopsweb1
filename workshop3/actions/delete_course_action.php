<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
require_once '../utils/database.php';

// Validar que la petición sea POST por seguridad
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM cursos WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../pages/cursos.php?msg=eliminado");
        exit();
    } else {
        echo "Error al eliminar el curso: " . mysqli_error($conexion);
    }
} else {
    // Si intentan entrar por GET (escribiendo la URL), redirigir
    header("Location: ../pages/cursos.php");
    exit();
}
mysqli_close($conexion);
?>
