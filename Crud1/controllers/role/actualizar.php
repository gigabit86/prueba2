<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';

// Verificar si la solicitud se realizó mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados por el formulario
    $id = $_POST['id'];
    // Escapar caracteres especiales en una cadena para su uso en una instrucción SQL
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);

    // Construir la consulta SQL para actualizar el nombre del rol
    $sql = "UPDATE roles SET nombre='$nombre' WHERE id=$id";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conexion, $sql)) {
        // Mostrar un mensaje de éxito si la actualización fue correcta
        echo "<div class='alert alert-success'>Rol actualizado correctamente.</div>";
    } else {
        // Mostrar un mensaje de error si ocurrió un problema al actualizar
        echo "<div class='alert alert-danger'>Error al actualizar el rol: " . mysqli_error($conexion) . "</div>";
    }
}

// Redirigir de vuelta a la lista de roles
header("Location: /views/role/listar.php");  // Ajusta según tu ruta
exit();
?>