<?php

// Importa las clases necesarias
use Illuminate\Database\Migrations\Migration; // Clase base para las migraciones
use Illuminate\Database\Schema\Blueprint; // Clase para definir el esquema de la base de datos
use Illuminate\Support\Facades\Schema; // Facade para interactuar con el esquema de la base de datos

// Define la clase CreateRolesTable que extiende de Migration, lo que permite crear y revertir migraciones.
class CreateRolesTable extends Migration
{
    /**
     * Método up que se ejecuta cuando se corre la migración.
     * Aquí se define lo que se debe hacer para aplicar la migración, como crear tablas, agregar columnas, etc.
     *
     * @return void
     */
    public function up()
    {
        // Crea la tabla 'roles' usando el Facade Schema.
        Schema::create('roles', function (Blueprint $table) {
            // Crea una columna de ID autoincremental.
            $table->id();
            // Crea una columna de tipo string para el nombre, con un máximo de 50 caracteres.
            $table->string('nombre', 50);
            // Crea las columnas 'created_at' y 'updated_at', que almacenan las marcas de tiempo de creación y actualización.
            $table->timestamps();
        });
    }

    /**
     * Método down que se ejecuta cuando se revierte la migración.
     * Aquí se define lo que se debe hacer para deshacer los cambios realizados en el método up, como eliminar tablas, eliminar columnas, etc.
     *
     * @return void
     */
    public function down()
    {
        // Elimina la tabla 'roles' si existe.
        Schema::dropIfExists('roles');
    }
}