<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Equipo;


class AdminController extends Controller{
    public function dashboard()
    {
        $users = User::all();
        return view("admin.dashboard", compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol_id' => ['required', 'exists:roles,id'],
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Usuario registrado exitosamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'rol_id' => ['required', 'exists:roles,id'],
        ]);

        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'rol_id' => $request->rol_id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Usuario actualizado con éxito');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.edit', compact('users'));
    }
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Usuario eliminado con éxito');
    }

    
    /*
    

    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->delete();
        return redirect()->route('jugador.read')->with('success', 'Jugador eliminado con éxito');
    }
/*/

}

