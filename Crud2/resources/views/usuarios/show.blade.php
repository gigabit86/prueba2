<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')

<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Título de la página -->
    <h1>Detalle del Usuario</h1>

    <!-- Muestra los detalles del usuario -->
    <p>Nombre: {{ $usuario->nombre }}</p>
    <p>Email: {{ $usuario->email }}</p>
    <p>Rol: {{ $usuario->role->nombre }}</p>
    <p>Creado: {{ $usuario->created_at }}</p>
    <p>Actualizado: {{ $usuario->updated_at }}</p>

    <!-- Enlace para editar el usuario -->
    <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>

    <!-- Formulario para eliminar el usuario -->
    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
        <!-- Campo de protección contra CSRF -->
        @csrf
        <!-- Campo para especificar que la solicitud es de tipo DELETE -->
        @method('DELETE')
        <!-- Botón para enviar el formulario -->
        <button type="submit">Eliminar</button>
    </form>

    <!-- Enlace para volver a la lista de usuarios -->
    <a href="{{ route('usuarios.index') }}">Volver a la lista</a>
<!-- Finaliza la sección de contenido -->
@endsection