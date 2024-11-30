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
        $torneo = Torneo::all();
        $equiposUsados = Partido::pluck('id_equipo_local')->merge(Partido::pluck('id_equipo_visitante'))->unique();
        $equipos = Equipo::whereNotIn('id', $equiposUsados)->get();
        $instalaciones = Instalacion::all();

        return view('partidos.create', compact('torneo', 'equipos', 'instalaciones'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_torneo' => 'required|exists:torneos,id',
            'id_equipo_local' => 'required|exists:equipos,id',
            'id_equipo_visitante' => 'required|exists:equipos,id|different:id_equipo_local',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_instalacion' => 'required|integer|exists:instalaciones,id',
        ]);

        try{
            // Obtener el torneo y el número de equipos
        $torneo = Torneo::findOrFail($request->id_torneo);
        $numeroEquipos = $torneo->numero_equipos;

        // Calcular el número máximo de partidos iniciales
        $maxPartidos = $numeroEquipos / 2;

        // Contar los partidos ya registrados para este torneo
        $partidosRegistrados = Partido::where('id_torneo', $request->id_torneo)->count();

        if ($partidosRegistrados >= $maxPartidos) {
            return back()
                ->withErrors([
                    'id_torneo' => 'Ya se han registrado todos los partidos iniciales necesarios para este torneo.',
                ])
                ->withInput();
        }

        // Validar conflictos de horario en la instalación
        $fechaHora = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->fecha . ' ' . $request->hora);
        $horaInicio = $fechaHora->copy()->subMinutes(90);
        $horaFin = $fechaHora->copy()->addMinutes(90);

        $conflicto = Partido::where('id_instalacion', $request->id_instalacion)
            ->where('fecha', $request->fecha)
            ->whereBetween('hora', [$horaInicio->format('H:i'), $horaFin->format('H:i')])
            ->exists();

        if ($conflicto) {
            return back()
                ->withErrors([
                    'hora' => 'Ya existe un partido registrado en esta instalación en un rango de 90 minutos.',
                ])
                ->withInput();
        }

        // Crear el partido
        Partido::create([
            'id_torneo' => $request->id_torneo,
            'id_equipo_local' => $request->id_equipo_local,
            'id_equipo_visitante' => $request->id_equipo_visitante,
            'id_instalacion' => $request->id_instalacion,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
        ]);

        return redirect()->route('partidos.read')->with('success', 'Partido registrado exitosamente.');
        } catch (\Exception $e){
            dd($e->getMessage());
        }

        
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
            'id_torneo' => 'required|exists:torneos,id',
            'id_equipo_local' => 'required|exists:equipos,id',
            'id_equipo_visitante' => 'required|exists:equipos,id|different:id_equipo_local',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_instalacion' => 'required|exists:instalaciones,id',
        ]);

        $fechaHora = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->fecha . ' ' . $request->hora);

        $horaInicio = $fechaHora->copy()->subMinutes(90);
        $horaFin = $fechaHora->copy()->addMinutes(90);

        $conflicto = Partido::where('id_instalacion', $request->id_instalacion)
            ->where('fecha', $request->fecha)
            ->whereBetween('hora', [$horaInicio->format('H:i'), $horaFin->format('H:i')])
            ->where('id', '!=', $id)
            ->exists();

        if ($conflicto) {
            return back()
                ->withErrors([
                    'hora' => 'Ya existe un partido registrado en esta instalación en un rango de 90 minutos.',
                ])
                ->withInput();
        }

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
