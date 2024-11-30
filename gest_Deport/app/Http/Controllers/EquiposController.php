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
            'patrocinador_equipo' => 'nullable|string|max:255',
            'monto_patrocinador' => 'nullable|integer',
            'escudo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deporte_id' => 'required|exists:deportes,id'
        ]);

        try{
        // Almacenar el archivo de imagen
        $path = $request->file('escudo')->store('public/escudos');
        $filename = basename($path);

        Equipo::create([
            'nombre_equipo' => $request->nombre_equipo,
            'patrocinador_equipo' => $request->patrocinador_equipo ?? 'Sin patrocinador',
            'monto_patrocinador' => $request->monto_patrocinador ?? 0,
            'escudo' => $filename,
            'id_deporte' => $request->deporte_id,
        ]);


        return redirect()->route('equipos.read')->with('success', 'Equipo registrado exitosamente');
    } catch (\Exception $e){
        dd($e->getMessage());
    }
    }


    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
{
    $equipos = Equipo::all();

    $request->validate([
        'nombre_equipo' => 'required|string|max:255',
        'patrocinador_equipo' => 'nullable|string|max:255',
            'monto_patrocinador' => 'nullable|integer',
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
    $equipo->patrocinador_equipo = $request->patrocinador_equipo ?? 'Sin patrocinador';
    $equipo->monto_patrocinador = $request->monto_patrocinador ?? 0;
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

    public function buscar(Request $request)
    {
        $id = $request->input('id');
        $equipo = Equipo::find($id);

        if ($equipo) {
            return response()->json($equipo);
        } else {
            return response()->json(['mensaje' => 'Equipo no encontrado'], 404);
        }
    }


}
