<?php

// Importa la fachada Route de Laravel, que se utiliza para definir las rutas de la aplicación
use Illuminate\Support\Facades\Route;

// Importa el controlador RoleController, que maneja las solicitudes relacionadas con los roles
use App\Http\Controllers\RoleController;

// Importa el controlador UsuarioController, que maneja las solicitudes relacionadas con los usuarios
use App\Http\Controllers\UsuarioController;

// Define una ruta para la página de inicio ("/")
// Cuando se realiza una solicitud GET a la página de inicio, se devuelve la vista 'home'
Route::get('/', function () {
    return view('home');
});

// Define las rutas para la gestión de roles
// La función resource() crea automáticamente varias rutas para manejar las operaciones CRUD (crear, leer, actualizar y eliminar) en los roles
// Estas rutas son manejadas por el RoleController
Route::resource('roles', RoleController::class);

// Define las rutas para la gestión de usuarios
// Al igual que con los roles, la función resource() crea automáticamente varias rutas para manejar las operaciones CRUD en los usuarios
// Estas rutas son manejadas por el UsuarioController
Route::resource('usuarios', UsuarioController::class);