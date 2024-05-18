<?php

// Define el espacio de nombres para este archivo. Esto ayuda a organizar las clases y evitar conflictos de nombres.
namespace App\Models;

// Importa la clase HasFactory, que se utiliza para crear factories en las pruebas.
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Importa la clase Model, que proporciona la funcionalidad de Eloquent ORM para interactuar con la base de datos.
use Illuminate\Database\Eloquent\Model;

// Define la clase Role que extiende de Model, lo que le permite usar todas las funcionalidades de Eloquent.
class Role extends Model
{
    // Usa la trait HasFactory para permitir el uso de factories en las pruebas.
    use HasFactory;

    // Define los campos que son asignables en masa. Estos son los campos que se pueden asignar masivamente usando métodos como create() o fill().
    protected $fillable = ['nombre'];

    // Define la relación de uno a muchos con la clase Usuario. Un rol puede tener muchos usuarios.
    public function usuarios()
    {
        // Retorna la relación de uno a muchos con la clase Usuario.
        // El método hasMany define una relación de uno a muchos.
        // Especifica que la relación está en la columna 'rol_id' de la tabla usuarios.
        return $this->hasMany(Usuario::class, 'rol_id');
    }
}
