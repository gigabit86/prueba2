<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metaetiquetas esenciales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página -->
    <title>Gestión de Usuarios</title>
    <!-- Inclusión de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inclusión de estilos personalizados -->
    <link rel="stylesheet" href="/asset/css/styles.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark fondo_header">
        <div class="container-fluid">
            <!-- Logo de la marca -->
            <a class="navbar-brand" href="/views/home/index.php">
                <img src="/asset/img/logo-aiep-header-nuevo.png" alt="Logo" class="d-inline-block align-text-top">
            </a>
            <!-- Botón de navegación responsiva -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contenido de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Lista de enlaces de navegación -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/views/home/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/usuario/listar.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/role/listar.php">Roles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Contenedor principal con margen superior -->
    <div class="container mt-5">