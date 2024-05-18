<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';

// Crear la consulta SQL para obtener todos los roles
$sql = "SELECT id, nombre FROM roles";

// Ejecutar la consulta y almacenar el resultado
$resultado = mysqli_query($conexion, $sql);

// Obtener todos los roles como un array asociativo
$roles = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>