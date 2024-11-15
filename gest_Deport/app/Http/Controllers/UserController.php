<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = Usuario::all();
        return view('users.index', compact('users'));
        // este es la vista del archivo al que te va redirigir por eso empieza por view
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Buscar el usuario por correo
        $user = Usuario::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->contraseña)) {
            // Autenticación exitosa
            switch ($user->rol_id) {
                case '1':
                    return redirect()->route('vistas.noticias');
                case '2':
                    return redirect()->route('entrenador.dashboard');
                case '3':
                    return redirect()->route('entrenador.dashboard');
                case '4':
                    return redirect()->route('vistas.noticias');
            }
        } else {
            // Autenticación fallida
            return redirect()->route('login')->withErrors(['login' => 'Credenciales incorrectas']);
        }
    }

    public function create()
    {
        return view('users.create');
    }

    // Valida los datos y guarda en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'contraseña' => 'required', // Cambié a 'contraseña'
            'rol_id' => 'required|in:1,2,3,4',
        ]);

        // Crear el usuario con el hash de la contraseña correcta
        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'contraseña' => Hash::make($request->contraseña), // Usa Hash::make en lugar de bcrypt
            'activo' => 1,
            'rol_id' => $request->rol_id,
        ]);

        $rol = $request->rol_id;

        // Redirige a la vista según el rol
        switch ($rol) {
            case '1':
                return view('modulos.vistas.noticias');
            case '2':
                return view('modulos.dashboard.index');
            case '3':
                return view('modulos.vistas.noticias');
            case '4':
                return view('modulos.vistas.noticias');
        }

        return redirect()->route('users.index')->with('success', 'Usuario creado con éxito');
    }


    // Muestra los detalles de un usuario específico
    public function show($id)
    {
        $user = Usuario::findOrFail($id);
        return view('users.show', compact('user'));
    }

    //Muestra un formulario para editar al usuario
    public function edit($id)
    {
        $user = Usuario::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Actualiza un usuario específico
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'rol_id' => 'required|in:1,2,3,4',
        ]);

        $user = Usuario::findOrFail($id);
        $user->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'rol_id' => $request->rol_id,
            'activo' => $request->has('activo') ? 1 : 0,  // Si el checkbox está marcado, se guarda 1 sino en 0
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }

    // Cambiar el estado activo de un usuario a inactivo
    public function destroy($id)
    {
        $user = Usuario::findOrFail($id);
        $user->update(['activo' => 0]);

        return redirect()->route('users.index')->with('success', 'Usuario desactivado con éxito');
    }
}
