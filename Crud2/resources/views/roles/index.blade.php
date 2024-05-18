<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')
<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Define un contenedor con margen superior -->
    <div class="container mt-5">
        <!-- Título de la página -->
        <h2>Listado de Roles</h2>
        <!-- Botón para crear un nuevo rol -->
        <a href="{{ route('roles.create') }}" class="btn btn-success mb-3">Crear Nuevo Rol</a>
        <!-- Bloque para mostrar mensajes de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Tabla para mostrar los roles -->
        <table class="table table-striped">
            <!-- Encabezado de la tabla -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
                <!-- Itera sobre cada rol y lo muestra -->
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->nombre }}</td>
                        <td>
                            <!-- Botón para editar el rol -->
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Editar</a>
                            <!-- Formulario para eliminar el rol -->
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Está seguro de que desea eliminar este rol?');">
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