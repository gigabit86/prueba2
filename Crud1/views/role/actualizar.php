<?php
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';
// Incluir el archivo de cabecera (header)
include_once '../../partials/header.php';

// Obtener el rol a editar
if (isset($_GET['id'])) {
    // Obtener el ID del rol desde la URL
    $id = $_GET['id'];
    // Crear la consulta SQL para obtener el rol por ID
    $sql = "SELECT * FROM roles WHERE id=$id";
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);
    // Obtener el rol como un array asociativo
    $rol = mysqli_fetch_assoc($resultado);
}
?>
<!-- Contenido de la página para actualizar el rol -->
<h2>Actualizar Rol</h2>
<!-- Formulario para actualizar el rol -->
<form action="../../controllers/role/actualizar.php" method="POST">
    <!-- Campo oculto para pasar el ID del rol -->
    <input type="hidden" name="id" value="<?= $rol['id'] ?>">
    <div class="mb-3">
        <!-- Etiqueta para el campo de nombre del rol -->
        <label for="nombre" class="form-label">Nombre del Rol:</label>
        <!-- Campo de entrada para el nombre del rol -->
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($rol['nombre']) ?>" required>
    </div>
    <!-- Botón para enviar el formulario -->
    <button type="submit" class="btn btn-primary">Actualizar Rol</button>
</form>

<?php
// Incluir el archivo de pie de página (footer)
include '../../partials/footer.php';
?>