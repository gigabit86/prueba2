<?php
// Establecer una conexión con la base de datos MySQL
// Parámetros de conexión: servidor, usuario, contraseña, nombre de la base de datos
$conexion = mysqli_connect("localhost", "root", "", "gestion_usuarios");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución del script
    die("Error de conexión: " . mysqli_connect_error());
}
?>