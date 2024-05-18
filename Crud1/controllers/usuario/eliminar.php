<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';

// Verificar si se ha proporcionado un ID y si es un número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Asignar el ID del usuario a una variable
    $id = $_GET['id'];

    // Crear la consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id = $id";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conexion, $sql)) {
        // Si la eliminación es exitosa, mostrar un mensaje de éxito y redirigir
        echo "<script>alert('Usuario eliminado correctamente.'); window.location.href='/views/usuario/listar.php';</script>";
    } else {
        // Si ocurre un error, mostrar un mensaje de error y redirigir
        echo "<script>alert('Error al eliminar usuario: " . mysqli_error($conexion) . "'); window.location.href='/views/usuario/listar.php';</script>";
    }
} else {
    // Si no se ha proporcionado un ID válido, mostrar un mensaje de error y redirigir
    echo "<script>alert('ID no válido.'); window.location.href='/views/usuario/listar.php';</script>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>