<?php include '../../partials/header.php'; ?>
<!-- Incluir el archivo de cabecera (header) -->

<!-- Título de la página -->
<h2>Crear Nuevo Rol</h2>

<!-- Formulario para crear un nuevo rol -->
<form action="../../controllers/role/crear.php" method="POST">
    <!-- Campo para el nombre del rol -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Rol:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Introduce el nombre del rol">
    </div>
    <!-- Botón para enviar el formulario -->
    <button type="submit" class="btn btn-primary">Crear Rol</button>
</form>

<?php include '../../partials/footer.php'; ?>
<!-- Incluir el archivo de pie de página (footer) -->