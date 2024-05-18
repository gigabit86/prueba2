<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')
<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Define un contenedor con margen superior -->
    <div class="container mt-5">
        <!-- Título de la página -->
        <h2>Listado de Usuarios</h2>
        <!-- Botón para crear un nuevo usuario -->
        <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">Crear Nuevo Usuario</a>
        <!-- Bloque para mostrar mensajes de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Tabla para mostrar la lista de usuarios -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre cada usuario y lo muestra en la tabla -->
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->role->nombre }}</td>
                        <td>
                            <!-- Botón para editar el usuario -->
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info">Editar</a>
                            <!-- Formulario para eliminar el usuario -->
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de querer eliminar este usuario?');">
                                <!-- Campo de protección contra CSRF -->
                                @csrf
                                <!-- Campo para especificar que la solicitud es de tipo DELETE -->
                                @method('DELETE')
                                <!-- Botón para enviar el formulario -->
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- Finaliza la sección de contenido -->
@endsection