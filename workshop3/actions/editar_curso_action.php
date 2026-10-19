<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
require_once '../utils/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $codigo_curso = mysqli_real_escape_string($conexion, $_POST['codigo_curso']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $id_carrera = intval($_POST['id_carrera']);
    $creditos = intval($_POST['creditos']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    $sql = "UPDATE cursos SET 
            codigo_curso = '$codigo_curso', 
            nombre = '$nombre', 
            id_carrera = $id_carrera, 
            creditos = $creditos, 
            descripcion = '$descripcion' 
            WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../pages/cursos.php?msg=actualizado");
        exit();
    } else {
        echo "Error al actualizar curso: " . mysqli_error($conexion);
    }
}
mysqli_close($conexion);
?>
