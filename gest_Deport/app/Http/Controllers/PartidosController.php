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
    // Validar los datos iniciales
    $validatedData = $request->validate([
        'id_torneo' => 'required|exists:torneos,id',
        'id_equipo_local' => 'required|exists:equipos,id',
        'id_equipo_visitante' => 'required|exists:equipos,id|different:id_equipo_local',
        'fecha' => 'required|date',
        'hora' => 'required|date_format:H:i',
        'id_instalacion' => 'required|integer|exists:instalaciones,id',
    ]);

    // Convertir fecha y hora en un objeto `Carbon`
    $fechaHora = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->fecha . ' ' . $request->hora);

    // Calcular el rango de tiempo permitido
    $horaInicio = $fechaHora->copy()->subMinutes(90);
    $horaFin = $fechaHora->copy()->addMinutes(90);

    // Verificar si ya existe un partido en la misma instalación y rango de tiempo
    $conflicto = Partido::where('id_instalacion', $request->id_instalacion)
        ->where('fecha', $request->fecha)
        ->whereBetween('hora', [$horaInicio->format('H:i'), $horaFin->format('H:i')])
        ->exists();

    if ($conflicto) {
        return back()->withErrors([
            'hora' => 'Ya existe un partido registrado en esta instalación en un rango de 90 minutos.'
        ])->withInput();
    }

    // Crear el partido si no hay conflictos
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
        // Validar los datos iniciales
        $validatedData = $request->validate([
            'id_torneo' => 'required|exists:torneos,id',
            'id_equipo_local' => 'required|exists:equipos,id',
            'id_equipo_visitante' => 'required|exists:equipos,id|different:id_equipo_local',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_instalacion' => 'required|exists:instalaciones,id',
        ]);

        // Convertir fecha y hora en un objeto `Carbon`
        $fechaHora = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->fecha . ' ' . $request->hora);

        // Calcular el rango de tiempo permitido
        $horaInicio = $fechaHora->copy()->subMinutes(90);
        $horaFin = $fechaHora->copy()->addMinutes(90);

        // Verificar si ya existe un partido en la misma instalación y rango de tiempo, excluyendo el partido actual
        $conflicto = Partido::where('id_instalacion', $request->id_instalacion)
            ->where('fecha', $request->fecha)
            ->whereBetween('hora', [$horaInicio->format('H:i'), $horaFin->format('H:i')])
            ->where('id', '!=', $id) // Excluir el partido actual
            ->exists();

        if ($conflicto) {
            return back()->withErrors([
                'hora' => 'Ya existe un partido registrado en esta instalación en un rango de 90 minutos.'
            ])->withInput();
        }

        // Encontrar el partido a actualizar
        $partido = Partido::findOrFail($id);

        // Actualizar el partido
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
