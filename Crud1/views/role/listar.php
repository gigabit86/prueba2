<?php 
// Incluir el archivo de cabecera (header)
include_once '../../partials/header.php';
// Incluir el archivo del controlador que lista los roles
include_once '../../controllers/role/listar.php';
?>

<!-- Título de la página -->
<h2>Listado de Roles</h2>
<!-- Enlace para crear un nuevo rol -->
<a href="crear.php" class="btn btn-success mb-3">Crear Rol</a>
<!-- Tabla para listar los roles -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $rol): ?>
            <tr>
                <td><?= $rol['id'] ?></td>
                <td><?= htmlspecialchars($rol['nombre']) ?></td>
                <td>
                    <!-- Enlace para actualizar el rol -->
                    <a href="actualizar.php?id=<?= $rol['id'] ?>" class="btn btn-info">Editar</a>
                    <!-- Enlace para eliminar el rol -->
                    <a href="../../controllers/role/eliminar.php?id=<?= $rol['id'] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
// Incluir el archivo de pie de página (footer)
include '../../partials/footer.php'; 
?>