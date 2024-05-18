<?php

// Define el espacio de nombres de este seeder
namespace Database\Seeders;

// Importa las clases necesarias
use Illuminate\Database\Seeder; // Clase base para los seeders
use Illuminate\Support\Facades\DB; // Facade para interactuar con la base de datos
use Illuminate\Support\Facades\Hash; // Facade para crear hashes de contraseñas
use Carbon\Carbon; // Biblioteca para manejar fechas

// Define la clase UsuariosTableSeeder que extiende de Seeder
class UsuariosTableSeeder extends Seeder
{
    /**
     * Método run que se ejecuta cuando se corre el seeder
     *
     * @return void
     */
    public function run()
    {
        // Inserta un registro en la tabla 'usuarios'
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Samuel', // Nombre del usuario
                'email' => 'samuelandres@gmail.com', // Email del usuario
                'password' => Hash::make('password'), // Contraseña del usuario (encriptada)
                'rol_id' => 1, // ID del rol del usuario
                'created_at' => Carbon::now(), // Fecha de creación
                'updated_at' => Carbon::now() // Fecha de actualización
            ]
        ]);
    }
}