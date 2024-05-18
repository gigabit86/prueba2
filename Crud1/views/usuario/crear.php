<?php 
// Incluir el archivo de configuración de la base de datos
include '../../config/db.php';  // Asegúrate de que la ruta es correcta según tu estructura
// Incluir el archivo de cabecera (header)
include '../../partials/header.php';

// Obtener todos los roles de la base de datos para el campo select
$sql = "SELECT id, nombre FROM roles";
$resultadoRoles = mysqli_query($conexion, $sql);
?>

<!-- Título de la página -->
<h2>Crear Usuario</h2>

<!-- Formulario para crear un nuevo usuario -->
<form action="../../controllers/usuario/crear.php" method="POST">
    <!-- Campo para el nombre del usuario -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <!-- Campo para el email del usuario -->
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <!-- Campo para la contraseña del usuario -->
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <!-- Campo para seleccionar el rol del usuario -->
    <div class="mb-3">
        <label for="rol_id" class="form-label">Rol:</label>
        <select class="form-control" id="rol_id" name="rol_id">
            <?php while ($rol = mysqli_fetch_assoc($resultadoRoles)): ?>
                <option value="<?= $rol['id'] ?>"><?= htmlspecialchars($rol['nombre']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <!-- Botón para enviar el formulario -->
    <button type="submit" class="btn btn-primary">Crear Usuario</button>
</form>

<?php 
// Liberar el resultado de la consulta de roles
mysqli_free_result($resultadoRoles);
// Incluir el archivo de pie de página (footer)
include '../../partials/footer.php'; 
?>