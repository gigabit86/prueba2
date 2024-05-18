<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')

<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Título de la página -->
    <h1>Detalle del Rol</h1>

    <!-- Muestra el nombre del rol -->
    <p>Nombre: {{ $role->nombre }}</p>
    <!-- Muestra la fecha de creación del rol -->
    <p>Creado: {{ $role->created_at }}</p>
    <!-- Muestra la fecha de última actualización del rol -->
    <p>Actualizado: {{ $role->updated_at }}</p>

    <!-- Enlace para editar el rol -->
    <a href="{{ route('roles.edit', $role->id) }}">Editar</a>

    <!-- Formulario para eliminar el rol -->
    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
        <!-- Campo de protección contra CSRF -->
        @csrf
        <!-- Campo para especificar que la solicitud es de tipo DELETE -->
        @method('DELETE')
        <!-- Botón para enviar el formulario -->
        <button type="submit">Eliminar</button>
    </form>

    <!-- Enlace para volver a la lista de roles -->
    <a href="{{ route('roles.index') }}">Volver a la lista</a>
<!-- Finaliza la sección de contenido -->
@endsection