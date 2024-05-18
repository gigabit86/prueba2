<?php

// Define el espacio de nombres de este seeder
namespace Database\Seeders;

// Importa las clases necesarias
use Illuminate\Database\Seeder; // Clase base para los seeders
use Illuminate\Support\Facades\DB; // Facade para interactuar con la base de datos
use Carbon\Carbon; // Biblioteca para manejar fechas

// Define la clase RolesTableSeeder que extiende de Seeder
class RolesTableSeeder extends Seeder
{
    /**
     * Método run que se ejecuta cuando se corre el seeder
     *
     * @return void
     */
    public function run()
    {
        // Inserta dos registros en la tabla 'roles'
        DB::table('roles')->insert([
            [
                'nombre' => 'Administrador', // Nombre del rol
                'created_at' => Carbon::now(), // Fecha de creación
                'updated_at' => Carbon::now() // Fecha de actualización
            ],
            [
                'nombre' => 'UsuarioPrueba', // Nombre del rol
                'created_at' => Carbon::now(), // Fecha de creación
                'updated_at' => Carbon::now() // Fecha de actualización
            ]
        ]);
    }
}