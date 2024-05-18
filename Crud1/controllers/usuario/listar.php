<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';

// Crear la consulta SQL para obtener todos los usuarios y sus roles
$sql = "SELECT usuarios.id, usuarios.nombre, usuarios.email, roles.nombre as rol_nombre FROM usuarios INNER JOIN roles ON usuarios.rol_id = roles.id";

// Ejecutar la consulta y almacenar el resultado
$resultado = mysqli_query($conexion, $sql);
?>