<?php

// Define el espacio de nombres para este archivo
namespace App\Http\Controllers;

// Importa el modelo Role para interactuar con roles
use App\Models\Role;
// Importa el objeto Request para manejar datos de formulario
use Illuminate\Http\Request;

// Define la clase RoleController que extiende de Controller
class RoleController extends Controller
{
    /**
     * Muestra una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene todos los roles de la base de datos usando el modelo Role
        $roles = Role::all();

        // Pasa los roles recuperados a la vista 'roles.index' para su representación
        return view('roles.index', compact('roles'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Representa la vista 'roles.create' para el formulario de creación de un nuevo rol
        return view('roles.create');
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos de la solicitud entrante para el campo 'nombre'
        $request->validate([
            'nombre' => 'required|unique:roles|max:50',  // Requerido, único, longitud máxima 50
        ]);

        // Crea una nueva instancia de Role utilizando los datos validados
        Role::create($request->all());

        // Muestra un mensaje de éxito y redirige a la página de índice de roles
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // Pasa el rol recuperado a la vista 'roles.show' para obtener detalles
        return view('roles.show', compact('role'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // Pasa el rol a la vista 'roles.edit' para el formulario de edición
        return view('roles.edit', compact('role'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Valida los datos de la solicitud entrante para el campo 'nombre' (requerido)
        $request->validate([
            'nombre' => 'required',
        ]);

        // Actualiza el rol existente con los datos validados
        $role->update($request->all());

        // Muestra un mensaje de éxito y redirige a la página de índice de roles
        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Elimina el rol de la base de datos
        $role->delete();

        // Muestra un mensaje de éxito y redirige a la página de índice de roles
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
}