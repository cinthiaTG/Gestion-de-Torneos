<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneo;
use App\Models\Jugador;
use App\Models\Equipo;


class TorneoController extends Controller{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_torneo' => 'required|string|max:255',
            'tipo_torneo' => 'required|string|max:255',
            'patrocinador_torneo' => 'nullable|string|max:255',
            'monto_patrocinador' => 'nullable|integer',
            'numero_equipos' => 'required|integer',
            'deporte_id' => 'required|integer',
        ]);

        Torneo::create([
            'nombre_torneo'  => $request->nombre_torneo,
            'patrocinador_torneo' => $request->patrocinador_torneo ?? 'Sin patrocinador',
            'monto_patrocinador' => $request->monto_patrocinador ?? 0,
            'tipo_torneo'  => $request->tipo_torneo,
            'numero_equipos'  => $request->numero_equipos,
            'deporte_id'  => $request->deporte_id,

        ]);

        return redirect()->route('torneo.create')->with('success', 'Torneo registrado exitosamente');
    }


    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneo.edit', compact('torneo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_torneo' => 'required',
            'tipo_torneo' => 'required',
            'patrocinador_torneo' => 'nullable|string|max:255',
            'monto_patrocinador' => 'nullable|integer',
            'numero_equipos' => 'required|integer',
            'deporte_id' => 'required|integer',

        ]);

        $torneo = Torneo::findOrFail($id);
        $torneo->update([
            'nombre_torneo' => $request->nombre_torneo,
            'tipo_torneo' => $request->tipo_torneo,
            'patrocinador_torneo'=>$request->patrocinador_torneo ?? 'Sin patrocinador',
            'monto_patrocinador' => $request->monto_patrocinador ?? 0,
            'numero_equipos' => $request->numero_equipos,

            'deporte_id'  => $request->deporte_id,

        ]);
        return redirect()->route('torneo.read')->with('success', 'Torneo actualizado con éxito');
    }

    public function destroy($id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->delete();
        return redirect()->route('torneo.read')->with('success', 'Torneo eliminado con éxito');
    }

    public function create()
    {
        return view('torneo.create');
    }

    public function read()
    {
        $torneo = Torneo::all();

        return view('torneo.read', compact('torneo'));
    }

}
