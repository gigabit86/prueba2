<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';
// Incluir el archivo de cabecera (header)
include_once '../../partials/header.php';
// Obtener el ID del usuario desde la URL, si no está definido, mostrar un mensaje de error y redirigir
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<script>alert('No se especificó el usuario.'); window.location.href='/views/usuario/listar.php';</script>";
    exit;
}
// Obtener los datos del usuario
$sqlUsuario = "SELECT * FROM usuarios WHERE id = $id";
$resultadoUsuario = mysqli_query($conexion, $sqlUsuario);
$usuario = mysqli_fetch_assoc($resultadoUsuario);
// Obtener todos los roles
$sqlRoles = "SELECT id, nombre FROM roles";
$resultadoRoles = mysqli_query($conexion, $sqlRoles);
// Procesar formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y escapar los datos del formulario
    $nombre = mysqli_real_escape_string($conexion, trim($_POST['nombre']));
    $email = mysqli_real_escape_string($conexion, trim($_POST['email']));
    // Si se proporciona una nueva contraseña, hashearla; de lo contrario, mantener la contraseña existente
    $password = trim($_POST['password']) ? password_hash(trim($_POST['password']), PASSWORD_DEFAULT) : $usuario['password'];
    $rol_id = intval($_POST['rol_id']);

    // Crear la consulta SQL para actualizar el usuario
    $sqlUpdate = "UPDATE usuarios SET nombre='$nombre', email='$email', password='$password', rol_id=$rol_id WHERE id=$id";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conexion, $sqlUpdate)) {
        echo "<script>alert('Usuario actualizado correctamente.'); window.location.href='/views/usuario/listar.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar usuario: " . mysqli_error($conexion) . "'); window.history.back();</script>";
    }
}
// Incluir la vista de actualización del usuario
include '../../views/usuario/actualizar.php';
// Incluir el archivo de pie de página (footer)
include '../../partials/footer.php';
?>