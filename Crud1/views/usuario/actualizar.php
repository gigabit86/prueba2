<?php
// Incluir el archivo de configuración de la base de datos
include '../../config/db.php';
// Incluir el archivo de cabecera (header)
include '../../partials/header.php';

// Verificar si se ha proporcionado un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Mostrar un mensaje de error y redirigir si no se proporciona el ID del usuario
    echo "<script>alert('No se proporcionó ID del usuario.'); window.location.href = '/views/usuario/listar.php';</script>";
    exit;
}

// Obtener el ID del usuario desde la URL
$id = $_GET['id'];

// Obtener la información del usuario a editar
$queryUsuario = "SELECT * FROM usuarios WHERE id = ?";
// Preparar la consulta SQL
$stmt = mysqli_prepare($conexion, $queryUsuario);
// Vincular el parámetro de la consulta
mysqli_stmt_bind_param($stmt, 'i', $id);
// Ejecutar la consulta
mysqli_stmt_execute($stmt);
// Obtener el resultado de la consulta
$resultadoUsuario = mysqli_stmt_get_result($stmt);
// Obtener el usuario como un array asociativo
$usuario = mysqli_fetch_assoc($resultadoUsuario);
// Liberar el resultado de la consulta
mysqli_free_result($resultadoUsuario);

// Obtener todos los roles para el dropdown
$queryRoles = "SELECT id, nombre FROM roles";
$resultadoRoles = mysqli_query($conexion, $queryRoles);
?>

<!-- Contenido de la página para actualizar el usuario -->
<h2>Actualizar Usuario</h2>
<!-- Formulario para actualizar el usuario -->
<form action="../../controllers/usuario/actualizar.php?id=<?= $usuario['id'] ?>" method="POST">
    <!-- Campo para el nombre del usuario -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
    </div>
    <!-- Campo para el email del usuario -->
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
    </div>
    <!-- Campo para la nueva contraseña del usuario -->
    <div class="mb-3">
        <label for="password" class="form-label">Nueva Contraseña (opcional):</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresar nueva contraseña">
    </div>
    <!-- Campo para seleccionar el rol del usuario -->
    <div class="mb-3">
        <label for="rol_id" class="form-label">Rol:</label>
        <select class="form-control" id="rol_id" name="rol_id">
            <?php while ($rol = mysqli_fetch_assoc($resultadoRoles)): ?>
                <option value="<?= $rol['id'] ?>" <?= $usuario['rol_id'] == $rol['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($rol['nombre']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <!-- Botón para enviar el formulario -->
    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
</form>

<?php
// Liberar el resultado de la consulta de roles
mysqli_free_result($resultadoRoles);
// Incluir el archivo de pie de página (footer)
include '../../partials/footer.php';
?>