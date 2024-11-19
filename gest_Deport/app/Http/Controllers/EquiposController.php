<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;



class EquiposController extends Controller{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'escudo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deporte_id' => 'required|exists:deportes,id'
        ]);

        // Almacenar el archivo de imagen
        $path = $request->file('escudo')->store('public/escudos');
        $filename = basename($path);

        Equipo::create([
            'nombre_equipo' => $request->nombre_equipo,
            'escudo' => $filename,
            'id_deporte' => $request->deporte_id,
        ]);

        return redirect()->route('equipos.create')->with('success', 'Equipo registrado exitosamente');
    }


    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre_equipo' => 'required|string|max:255',
        'escudo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $equipo = Equipo::findOrFail($id);

    // Verificar si se subió un nuevo escudo
    if ($request->hasFile('escudo')) {
        // Eliminar el escudo anterior si existe
        if ($equipo->escudo) {
            Storage::delete('public/escudos/' . $equipo->escudo);
        }

        // Subir el nuevo escudo
        $path = $request->file('escudo')->store('public/escudos');
        $equipo->escudo = basename($path);
    }

    // Actualizar los datos del equipo
    $equipo->nombre_equipo = $request->nombre_equipo;
    $equipo->save();

    return redirect()->route('equipos.read')->with('success', 'Equipo actualizado correctamente.');
}


    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        Storage::delete('public/escudos/' . $equipo->escudo); // Eliminar escudo del equipo
        $equipo->delete();
        return redirect()->route('equipos.read')->with('success', 'Equipo actualizado con éxito');
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function read()
    {
        $equipos = Equipo::all();

        return view('equipos.read', compact('equipos'));
    }

}
