<?php
function obtenerProvincias($conexion) {
    return mysqli_query($conexion, 'SELECT * FROM provincias ORDER BY nombre');
}
function existeProvincia($conexion, $id) {
    $id = intval($id);
    $resultado = mysqli_query($conexion, "SELECT id FROM provincias WHERE id = $id");
    return $resultado && mysqli_num_rows($resultado) > 0;
}
