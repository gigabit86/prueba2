<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')
<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Define un contenedor con margen superior -->
    <div class="container mt-5">
        <!-- Título de la página -->
        <h2>Crear Usuario</h2>
        <!-- Bloque para mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Formulario para crear un nuevo usuario -->
        <form action="{{ route('usuarios.store') }}" method="POST">
            <!-- Campo de protección contra CSRF -->
            @csrf
            <!-- Campo para el nombre del usuario -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>
            <!-- Campo para el email del usuario -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <!-- Campo para la contraseña del usuario -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div> 
            <!-- Campo para seleccionar el rol del usuario -->
            <div class="mb-3">
                <label for="rol_id" class="form-label">Rol:</label>
                <select class="form-control" id="rol_id" name="rol_id" required>
                    <!-- Itera sobre cada rol y lo muestra en el select -->
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
    </div>
<!-- Finaliza la sección de contenido -->
@endsection