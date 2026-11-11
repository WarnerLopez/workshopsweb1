<?php
$conexion = mysqli_connect('localhost', 'root', '', 'login_workshop');

if (!$conexion) { 
    die('Error de conexión a la base de datos.'); }
mysqli_set_charset($conexion, 'utf8mb4');
