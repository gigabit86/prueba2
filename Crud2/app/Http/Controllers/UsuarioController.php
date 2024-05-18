<?php
namespace App\Http\Controllers;
// Importamos los modelos Usuario y Role, la clase Request para manejar las solicitudes HTTP y la clase Hash para encriptar contraseñas
use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Definimos la clase UsuarioController que extiende de la clase base Controller
class UsuarioController extends Controller
{
    // Método para mostrar todos los usuarios
    public function index()
    {
        // Obtenemos todos los usuarios con sus roles asociados
        $usuarios = Usuario::with('role')->get();
        // Retornamos la vista 'usuarios.index' con los usuarios obtenidos
        return view('usuarios.index', compact('usuarios'));
    }

    // Método para mostrar el formulario de creación de usuarios
    public function create()
    {
        // Obtenemos todos los roles
        $roles = Role::all();
        // Retornamos la vista 'usuarios.create' con los roles obtenidos
        return view('usuarios.create', compact('roles'));
    }

    // Método para almacenar un nuevo usuario
    public function store(Request $request)
    {
        // Validamos los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:usuarios',
            'password' => 'required|string|min:6',
            'rol_id' => 'required|exists:roles,id'
        ]);

        // Creamos un nuevo usuario con los datos del formulario
        $usuario = new Usuario([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptamos la contraseña
            'rol_id' => $request->rol_id,
        ]);

        // Guardamos el usuario en la base de datos
        $usuario->save();

        // Redirigimos al usuario a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    // Método para mostrar un usuario específico
    public function show(Usuario $usuario)
    {
        // Retornamos la vista 'usuarios.show' con el usuario obtenido
        return view('usuarios.show', compact('usuario'));
    }

    // Método para mostrar el formulario de edición de un usuario
    public function edit(Usuario $usuario)
    {
        // Obtenemos todos los roles
        $roles = Role::all();
        // Retornamos la vista 'usuarios.edit' con el usuario y los roles obtenidos
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    // Método para actualizar un usuario
    public function update(Request $request, Usuario $usuario)
    {
        // Validamos los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable|string|min:6|confirmed',
            'rol_id' => 'required|exists:roles,id'
        ]);

        // Actualizamos los datos del usuario con los datos del formulario
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        if ($request->password) {
            $usuario->password = Hash::make($request->password); // Encriptamos la contraseña si se proporcionó una nueva
        }
        $usuario->rol_id = $request->rol_id;

        // Guardamos el usuario en la base de datos
        $usuario->save();

        // Redirigimos al usuario a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Método para eliminar un usuario
    public function destroy(Usuario $usuario)
    {
        // Eliminamos el usuario de la base de datos
        $usuario->delete();
        // Redirigimos al usuario a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}