<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Usuarios</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS personalizado -->
    <link rel="stylesheet" href="/asset/css/styles.css">
</head>
<body>
    <!-- Incluir el encabezado -->
    @include('partials.header')
    <div class="container">
        <!-- Mostrar el contenido dinámico -->
        @yield('content')
    </div>
    <!-- Incluir el pie de página -->
    @include('partials.footer')
    <!-- Incluir el archivo JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>