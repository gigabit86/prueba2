<!-- Extiende la plantilla principal 'layouts.app' -->
@extends('layouts.app')

<!-- Inicia la sección de contenido -->
@section('content')
    <!-- Título de la página -->
    <h1>Bienvenido a la Gestión de Usuarios</h1>
    <!-- Descripción de la página -->
    <p>Esta es la página de inicio. Desde aquí puedes gestionar roles y usuarios.</p>
    <!-- Enlace para ver la lista de roles -->
    <a href="{{ route('roles.index') }}">Ver Roles</a>
    <br>
    <!-- Enlace para ver la lista de usuarios -->
    <a href="{{ route('usuarios.index') }}">Ver Usuarios</a>
<!-- Finaliza la sección de contenido -->
@endsection