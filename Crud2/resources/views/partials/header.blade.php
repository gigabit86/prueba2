<nav class="navbar navbar-expand-lg navbar-light fondo_header">
    <div class="container-fluid">
        <!-- Enlace a la página de inicio -->
        <a class="navbar-brand" href="{{ url('/') }}"><img src="/asset/img/logo-aiep-header-nuevo.png" alt="" class="d-inline-block align-text-top"></a>
        <!-- Botón para desplegar el menú en dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Enlace a la página de inicio -->
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                <!-- Enlace a la página de roles -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                </li>
                <!-- Enlace a la página de usuarios -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
