<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Torneo;
use App\Models\Equipo;
use App\Models\Instalacion;


class PartidosController extends Controller
{
    public function create()
    {
        // Obtener datos necesarios para los select de torneos y equipos
        $torneo = Torneo::all();
        $equipos = Equipo::all();
        $instalaciones = Instalacion::all();
        return view('partidos.create', compact('torneo', 'equipos','instalaciones'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_torneo' => 'required|exists:torneos,id',
            'id_equipo_local' => 'required|exists:equipos,id',
            'id_equipo_visitante' => 'required|exists:equipos,id|different:id_equipo_local',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_instalacion' => 'required|integer',
        ]);

        Partido::create([
            'id_torneo' => $request->id_torneo,
            'id_equipo_local' => $request->id_equipo_local,
            'id_instalacion' => $request->id_instalacion,
            'id_equipo_visitante' => $request->id_equipo_visitante,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
        ]);

        return redirect()->route('partidos.create')->with('success', 'Partido registrado exitosamente.');
    }

    public function read()
    {
        $partidos = Partido::all();
        $torneo = Torneo::all();
        $equipos = Equipo::all();
        return view('partidos.read', compact('partidos', 'torneo', 'equipos'));
    }

    public function edit($id)
    {
        $partidos = Partido::findOrFail($id);
        $torneo = Torneo::all();
        $equipos = Equipo::all();
        return view('partidos.edit', compact('partidos', 'torneo', 'equipos'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_torneo' => 'required|exists:torneo,id',
            'id_equipo_local' => 'required|exists:equipos,id',
            'id_instalacion' => 'required|integer',
            'id_equipo_visitante' => 'required|exists:equipos,id|different:id_equipo_local',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        $partido = Partido::findOrFail($id);
        $partido->update([
            'id_torneo' => $request->id_torneo,
            'id_equipo_local' => $request->id_equipo_local,
            'id_equipo_visitante' => $request->id_equipo_visitante,
            'id_instalacion' => $request->id_instalacion,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
        ]);

        return redirect()->route('partidos.read')->with('success', 'Partido actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->delete();
        return redirect()->route('partidos.read')->with('success', 'Partido eliminado exitosamente.');
    }
}
