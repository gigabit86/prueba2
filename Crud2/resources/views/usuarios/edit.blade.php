<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')

<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Define un contenedor con margen superior -->
    <div class="container mt-5">
        <!-- Título de la página -->
        <h2>Editar Usuario</h2>

        <!-- Formulario para actualizar un usuario existente -->
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            <!-- Campo de protección contra CSRF -->
            @csrf
            <!-- Campo para especificar que la solicitud es de tipo PUT -->
            @method('PUT')
            <!-- Campo para el nombre del usuario -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
            </div>
            <!-- Campo para el email del usuario -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>
            <!-- Campo para la contraseña del usuario -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña (dejar en blanco para no cambiar):</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <!-- Campo para seleccionar el rol del usuario -->
            <div class="mb-3">
                <label for="rol_id" class="form-label">Rol:</label>
                <select class="form-control" id="rol_id" name="rol_id">
                    <!-- Itera sobre cada rol y lo muestra en el select -->
                    @foreach($roles as $role)
                        <!-- Si el rol del usuario es igual al rol actual, se selecciona por defecto -->
                        <option value="{{ $role->id }}" {{ $usuario->rol_id == $role->id ? 'selected' : '' }}>{{ $role->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
<!-- Finaliza la sección de contenido -->
@endsection