<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';

// Verificar si la solicitud se realizó mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar datos del formulario
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    $rol_id = intval($_POST['rol_id']);

    // Validar que el email no esté ya registrado
    $consultaEmail = "SELECT id FROM usuarios WHERE email = '$email'";
    $resultadoEmail = mysqli_query($conexion, $consultaEmail);
    if (mysqli_num_rows($resultadoEmail) > 0) {
        // Si el email ya está registrado, mostrar un mensaje de alerta y retroceder
        echo "<script>alert('El email ya está registrado.'); window.history.back();</script>";
        exit();
    }

    
    // Encriptar la contraseña
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Crear la consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES ('$nombre', '$email', '$password_hashed', $rol_id)";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Si la inserción es exitosa, mostrar un mensaje de éxito y redirigir
        echo "<script>alert('Usuario creado correctamente.'); window.location.href='/views/usuario/listar.php';</script>";
    } else {
        // Si ocurre un error, mostrar un mensaje de error y retroceder
        echo "<script>alert('Error al crear usuario: " . mysqli_error($conexion) . "'); window.history.back();</script>";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>