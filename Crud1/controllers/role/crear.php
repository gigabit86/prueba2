<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';

// Verificar si la solicitud se realizó mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar datos del formulario
    $nombre = mysqli_real_escape_string($conexion, trim($_POST['nombre']));

    // Validar que el nombre del rol no esté ya registrado
    $consultaNombre = "SELECT id FROM roles WHERE nombre = '$nombre'";
    $resultadoNombre = mysqli_query($conexion, $consultaNombre);
    if (mysqli_num_rows($resultadoNombre) > 0) {
        // Si el nombre del rol ya está registrado, mostrar un mensaje de alerta y retroceder
        echo "<script>alert('El nombre del rol ya está registrado.'); window.history.back();</script>";
        exit();
    }

    // Crear la consulta SQL para insertar el nuevo rol
    $sql = "INSERT INTO roles (nombre) VALUES ('$nombre')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Si la inserción es exitosa, mostrar un mensaje de éxito y redirigir a la lista de roles
        echo "<script>alert('Rol creado correctamente.'); window.location.href='/views/role/listar.php';</script>";
    } else {
        // Si ocurre un error, mostrar un mensaje de error y retroceder
        echo "<script>alert('Error al crear rol: " . mysqli_error($conexion) . "'); window.history.back();</script>";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>