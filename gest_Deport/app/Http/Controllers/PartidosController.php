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

        try {
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
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function registrarresultado(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'marcador_local' => ['required', 'integer', 'min:0'],
            'marcador_visitante' => ['required', 'integer', 'min:0', 'different:marcador_local'],
        ], [
            'different' => 'El marcador del equipo local y visitante no pueden ser iguales.',
        ]);

        // Actualizar el partido con los resultados
        $partido = Partido::findOrFail($id);
        $partido->update([
            'marcador_local' => $request->marcador_local,
            'marcador_visitante' => $request->marcador_visitante,
            'finalizado' => true,
            'id_ganador' => $request->marcador_local > $request->marcador_visitante ? $partido->id_equipo_local : $partido->id_equipo_visitante,
        ]);

        return redirect()->route('partidos.read')->with('success', 'Resultado registrado exitosamente.');
    }

    public function mandarresultado($id)
    {
        // Obtener el partido por su ID
        $partido = Partido::with(['torneo', 'equipoLocal', 'equipoVisitante'])->findOrFail($id);

        return view('partidos.mandarresultado', compact('partido'));
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
        $partido = Partido::findOrFail($id);
        $torneo = Torneo::all();
        $equipos = Equipo::all();
        return view('partidos.edit', compact('partido', 'torneo', 'equipos'));
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

    public function generarPrimeraRonda($idTorneo)
    {
        $torneo = Torneo::with('equipos')->findOrFail($idTorneo);
        $equipos = $torneo->equipos;

        if ($equipos->count() != 4 && $equipos->count() != 8 && $equipos->count() != 16) {
            return redirect()->back()->withErrors(['error' => 'El torneo debe tener 4, 8 o 16 equipos.']);
        }

        $equipos = $equipos->shuffle(); // Mezclar equipos aleatoriamente.
        $instalaciones = Instalacion::all(); // Usar instalaciones disponibles.

        $ronda = 1;
        for ($i = 0; $i < $equipos->count(); $i += 2) {
            Partido::create([
                'id_torneo' => $idTorneo,
                'id_equipo_local' => $equipos[$i]->id,
                'id_equipo_visitante' => $equipos[$i + 1]->id,
                'id_instalacion' => $instalaciones->random()->id,
                'fecha' => now()->addDays($ronda),
                'hora' => now()->addHours($ronda * 2)->format('H:i'),
                'ronda' => $ronda,
            ]);
        }

        return redirect()->route('partidos.read')->with('success', 'Primera ronda generada exitosamente.');
    }

    public function avanzarRonda($idTorneo)
    {
        $torneo = Torneo::findOrFail($idTorneo);

        // Obtener la última ronda registrada para este torneo
        $ultimaRonda = Partido::where('id_torneo', $idTorneo)->max('ronda');

        // Verificar si todos los partidos de la última ronda están finalizados
        $partidosUltimaRonda = Partido::where('id_torneo', $idTorneo)
            ->where('ronda', $ultimaRonda)
            ->get();

        if ($partidosUltimaRonda->isEmpty()) {
            return redirect()->back()->withErrors('No hay partidos en la ronda actual.');
        }

        if ($partidosUltimaRonda->where('finalizado', false)->isNotEmpty()) {
            return redirect()->back()->withErrors('No todos los partidos de la ronda actual han concluido.');
        }

        // Obtener los ganadores de la última ronda
        $ganadores = $partidosUltimaRonda->pluck('id_ganador')->filter();

        if ($ganadores->count() < 2) {
            return redirect()->back()->with('success', 'El torneo ha finalizado. No hay suficientes equipos para continuar.');
        }

        // Crear los nuevos partidos para la siguiente ronda
        $nuevaRonda = $ultimaRonda + 1;
        for ($i = 0; $i < $ganadores->count(); $i += 2) {
            if (isset($ganadores[$i + 1])) {
                Partido::create([
                    'id_torneo' => $idTorneo,
                    'id_equipo_local' => $ganadores[$i],
                    'id_equipo_visitante' => $ganadores[$i + 1],
                    'ronda' => $nuevaRonda,
                    'fecha' => now()->addDays(1)->toDateString(), // Puedes ajustar la fecha y hora
                    'hora' => now()->addHours(1)->toTimeString(),
                    'id_instalacion' => 1, // Ajusta esto según tus datos
                ]);
            }
        }

        return redirect()->route('torneo.detalle', $idTorneo)
            ->with('success', 'Se ha avanzado a la siguiente ronda.');
    }

    public function determinarCampeon($idTorneo)
    {
        $partidoFinal = Partido::where('id_torneo', $idTorneo)
            ->where('ronda', Partido::max('ronda'))
            ->where('finalizado', true)
            ->first();

        if (!$partidoFinal) {
            return redirect()->back()->withErrors(['error' => 'El partido final no se ha jugado aún.']);
        }

        $campeon = Equipo::find($partidoFinal->id_ganador);

        return redirect()->route('torneos.show', $idTorneo)
            ->with('success', "El campeón del torneo es: {$campeon->nombre}");
    }

    public function actualizarResultado(Request $request, $id)
    {
        $partido = Partido::findOrFail($id);

        // Aquí recibimos los resultados del formulario
        $resultado = $request->input('resultado'); // 'ganador', 'empate', 'perdedor'
        $id_ganador = null;

        // Asignamos el ganador o si es empate
        if ($resultado === 'ganador_local') {
            $id_ganador = $partido->id_equipo_local;
        } elseif ($resultado === 'ganador_visitante') {
            $id_ganador = $partido->id_equipo_visitante;
        }

        // Actualizamos el campo ganador
        $partido->id_ganador = $id_ganador;
        $partido->finalizado = true; // Marcamos el partido como finalizado

        // Guardamos los cambios
        $partido->save();

        return redirect()->route('partidos.show', $partido->id)
            ->with('success', 'Resultado actualizado correctamente');
    }
}
