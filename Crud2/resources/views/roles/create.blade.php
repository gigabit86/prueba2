<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')

<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Define un contenedor con margen superior -->
    <div class="container mt-5">
        <!-- Título de la página -->
        <h2>Crear Rol</h2>

        <!-- Bloque para mostrar errores -->
        <div class="alert alert-danger">
            <!-- Lista para mostrar cada error -->
            <ul>
                <!-- Itera sobre cada error y lo muestra -->
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Formulario para crear un nuevo rol -->
        <form action="{{ route('roles.store') }}" method="POST">
            <!-- Campo de protección contra CSRF -->
            @csrf
            <!-- Campo para el nombre del rol -->
            <div>
                <label for="nombre" class="form-label">Nombre del Rol:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Crear Rol</button>
        </form>
    </div>
<!-- Finaliza la sección de contenido -->
@endsection