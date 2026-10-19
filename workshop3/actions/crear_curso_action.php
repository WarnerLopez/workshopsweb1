<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../utils/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_curso = mysqli_real_escape_string($conexion, $_POST['codigo_curso']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $id_carrera = intval($_POST['id_carrera']);
    $creditos = intval($_POST['creditos']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    $sql = "INSERT INTO cursos (codigo_curso, nombre, id_carrera, creditos, descripcion) 
            VALUES ('$codigo_curso', '$nombre', $id_carrera, $creditos, '$descripcion')";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../pages/cursos.php?msg=creado");
        exit();
    } else {
        echo "Error al crear curso: " . mysqli_error($conexion);
    }
}
mysqli_close($conexion);
?>
