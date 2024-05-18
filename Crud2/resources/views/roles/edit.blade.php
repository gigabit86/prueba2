<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')

<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Define un contenedor con margen superior -->
    <div class="container mt-5">
        <!-- Título de la página -->
        <h2>Editar Rol</h2>

        <!-- Formulario para actualizar un rol existente -->
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            <!-- Campo de protección contra CSRF -->
            @csrf
            <!-- Campo para especificar que la solicitud es de tipo PUT -->
            @method('PUT')
            <!-- Campo para el nombre del rol -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Rol:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $role->nombre) }}" required>
            </div>
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Actualizar Rol</button>
        </form>
    </div>
<!-- Finaliza la sección de contenido -->
@endsection