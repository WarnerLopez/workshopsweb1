<?php
function obtenerCursos($conexion) {
    return mysqli_query($conexion, 'SELECT * FROM cursos ORDER BY id DESC');
}
function obtenerCurso($conexion, $id) {
    $id = intval($id);
    $resultado = mysqli_query($conexion, "SELECT * FROM cursos WHERE id = $id");
    return $resultado ? mysqli_fetch_assoc($resultado) : null;
}
function crearCurso($conexion, $codigo, $nombre, $carrera, $creditos, $descripcion) {
    $codigo = mysqli_real_escape_string($conexion, $codigo);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $carrera = intval($carrera);
    $creditos = intval($creditos);
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);
    return mysqli_query($conexion, "INSERT INTO cursos (codigo_curso, nombre, id_carrera, creditos, descripcion) VALUES ('$codigo', '$nombre', $carrera, $creditos, '$descripcion')");
}
function actualizarCurso($conexion, $id, $codigo, $nombre, $carrera, $creditos, $descripcion) {
    $id = intval($id);
    $codigo = mysqli_real_escape_string($conexion, $codigo);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $carrera = intval($carrera);
    $creditos = intval($creditos);
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);
    return mysqli_query($conexion, "UPDATE cursos SET codigo_curso = '$codigo', nombre = '$nombre', id_carrera = $carrera, creditos = $creditos, descripcion = '$descripcion' WHERE id = $id");
}
function eliminarCurso($conexion, $id) {
    $id = intval($id);
    return mysqli_query($conexion, "DELETE FROM cursos WHERE id = $id");
}
