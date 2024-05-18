<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';
// Verificar si se proporcionó el ID del rol a eliminar
if (isset($_GET['id'])) {
    // Convertir el ID a un entero por seguridad
    $id = intval($_GET['id']);

    // Verificar si el rol está asignado a algún usuario
    $checkSql = "SELECT COUNT(*) AS count FROM usuarios WHERE rol_id = $id";
    $checkResult = mysqli_query($conexion, $checkSql);
    $count = mysqli_fetch_assoc($checkResult)['count'];

    // Si el rol está asignado a uno o más usuarios, mostrar un mensaje de alerta y redirigir
    if ($count > 0) {
        echo "<script>alert('No se puede eliminar el rol porque está asignado a uno o más usuarios.'); window.location.href='/views/role/listar.php';</script>";
    } else {
        // Crear la consulta SQL para eliminar el rol
        $sql = "DELETE FROM roles WHERE id = $id";

        // Ejecutar la consulta y verificar si fue exitosa
        if (mysqli_query($conexion, $sql)) {
            // Si la eliminación es exitosa, mostrar un mensaje de éxito y redirigir
            echo "<script>alert('Rol eliminado correctamente.'); window.location.href='/views/role/listar.php';</script>";
        } else {
            // Si ocurre un error, mostrar un mensaje de error y redirigir
            echo "<script>alert('Error al eliminar rol: " . mysqli_error($conexion) . "'); window.location.href='/views/role/listar.php';</script>";
        }
    }
} else {
    // Si no se proporcionó un ID de rol, mostrar un mensaje de error y redirigir
    echo "<script>alert('Error: No se proporcionó ningún ID de rol.'); window.location.href='/views/role/listar.php';</script>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>