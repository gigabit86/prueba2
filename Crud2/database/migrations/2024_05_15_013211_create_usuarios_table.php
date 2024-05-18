<?php

// Importa las clases necesarias
use Illuminate\Database\Migrations\Migration; // Clase base para las migraciones
use Illuminate\Database\Schema\Blueprint; // Clase para definir el esquema de la base de datos
use Illuminate\Support\Facades\Schema; // Facade para interactuar con el esquema de la base de datos

// Define la clase CreateUsuariosTable que extiende de Migration
class CreateUsuariosTable extends Migration
{
    /**
     * Método up que se ejecuta cuando se corre la migración
     *
     * @return void
     */
    public function up()
    {
        // Crea la tabla 'usuarios'
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Crea una columna de ID autoincremental
            $table->string('nombre', 50); // Crea una columna de tipo string para el nombre (máximo 50 caracteres)
            $table->string('email', 50)->unique(); // Crea una columna de tipo string para el email (máximo 50 caracteres) que debe ser única
            $table->string('password', 255); // Crea una columna de tipo string para la contraseña (máximo 255 caracteres)
            $table->foreignId('rol_id')->constrained('roles'); // Crea una columna de ID foráneo para el rol, que referencia a la tabla 'roles'
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Método down que se ejecuta cuando se revierte la migración
     *
     * @return void
     */
    public function down()
    {
        // Elimina la tabla 'usuarios'
        Schema::dropIfExists('usuarios');
    }
}