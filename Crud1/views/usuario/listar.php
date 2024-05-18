<?php 
// Incluir el archivo de cabecera (header)
include_once '../../partials/header.php';
// Incluir el archivo de configuración de la base de datos
include_once '../../config/db.php';
// Incluir el archivo del controlador que lista los usuarios
include_once '../../controllers/usuario/listar.php';
?>

<!-- Título de la página -->
<h2>Listado de Usuarios</h2>
<!-- Enlace para crear un nuevo usuario -->
<a href="crear.php" class="btn btn-success mb-3">Crear Usuario</a>
<!-- Tabla para listar los usuarios -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($usuario = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['email']) ?></td>
                <td><?= htmlspecialchars($usuario['rol_nombre']) ?></td>
                <td>
                    <!-- Enlace para actualizar el usuario -->
                    <a href="actualizar.php?id=<?= $usuario['id'] ?>" class="btn btn-info">Editar</a>
                    <!-- Enlace para eliminar el usuario, con confirmación -->
                    <a href="../../controllers/usuario/eliminar.php?id=<?= $usuario['id'] ?>" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php 
// Liberar el resultado de la consulta
mysqli_free_result($resultado);
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
// Incluir el archivo de pie de página (footer)
include '../../partials/footer.php'; 
?>