<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Torneo;
use App\Models\Jugador;
use App\Models\Equipo;

class TorneoController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nombre_torneo' => 'required|string|max:20|unique:torneos,nombre_torneo',
                'patrocinador_torneo' => 'nullable|string|max:20',
                'monto_patrocinador' => 'nullable|integer|min:0|max:1000000',
                'numero_equipos' => 'required|integer|in:4,8,16',
            ],
            [
                'nombre_torneo.required' => 'El nombre del torneo es obligatorio.',
                'nombre_torneo.max' => 'El nombre del torneo no puede exceder los 20 caracteres.',
                'nombre_torneo.unique' => 'El nombre del torneo ya existe. Por favor, elija otro.',
                'numero_equipos.in' => 'El número de equipos debe ser 4, 8 o 16.',
            ],
        );

        try {
            Torneo::create([
                'nombre_torneo' => $request->nombre_torneo,
                'patrocinador_torneo' => $request->patrocinador_torneo ?? 'Sin patrocinador',
                'monto_patrocinador' => $request->monto_patrocinador ?? 0,
                'numero_equipos' => $request->numero_equipos,
            ]);

            return redirect()->route('torneo.read')->with('success', 'Torneo registrado exitosamente');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneo.edit', compact('torneo'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'nombre_torneo' => 'required|string|max:20|unique:torneos,nombre_torneo,' . $id,
                'patrocinador_torneo' => 'nullable|string|max:20',
                'monto_patrocinador' => 'nullable|integer|min:0|max:1000000',
            ],
            [
                'nombre_torneo.required' => 'El nombre del torneo es obligatorio.',
                'nombre_torneo.max' => 'El nombre del torneo no puede exceder los 20 caracteres.',
                'nombre_torneo.unique' => 'El nombre del torneo ya existe. Por favor, elija otro.',
            ],
        );

        $torneo = Torneo::findOrFail($id);
        $torneo->update([
            'nombre_torneo' => $request->nombre_torneo,
            'patrocinador_torneo' => $request->patrocinador_torneo ?? 'Sin patrocinador',
            'monto_patrocinador' => $request->monto_patrocinador ?? 0,
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

    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $torneos = Torneo::where('nombre_torneo', 'LIKE', "%$nombre%")->get();
        return response()->json($torneos);
    }

    public function generarPDFTorneos(Request $request): \Illuminate\Http\Response
    {
        $torneos = Torneo::where('nombre_torneo', 'like', '%' . $request->nombre . '%')->get();

        $pdf = PDF::loadView('pdf.torneos', compact('torneos'));

        return $pdf->download('torneos.pdf');
    }

    public function mostrarTorneo($torneoId)
    {
        // Obtiene el torneo con sus partidos, equipos relacionados y los agrupa por ronda
        $torneo = Torneo::with(['partidos.equipoLocal', 'partidos.equipoVisitante', 'partidos.instalacion'])->findOrFail($torneoId);

        // Agrupa los partidos por ronda
        $partidosPorRonda = $torneo->partidos->groupBy('ronda');

        return view('torneo.detalle', compact('torneo', 'partidosPorRonda'));
    }

    public function detalleTorneo($id)
    {
        // Obtener el torneo por su ID
        $torneo = Torneo::findOrFail($id);

        // Obtener los partidos por ronda
        $partidosPorRonda = $this->getPartidosPorRonda($torneo);

        // Obtener el ganador si existe
        $ganador = $this->calcularGanador($torneo);

        // Pasar los datos a la vista
        return view('torneo.detalle', compact('torneo', 'partidosPorRonda', 'ganador'));
    }

    // Función para obtener partidos por ronda
    private function getPartidosPorRonda($torneo)
    {
        // Lógica para obtener los partidos por ronda
        $partidos = Partido::where('id_torneo', $torneo->id)->get();

        // Agrupar por ronda (este es un ejemplo, asegúrate de que se agrupe correctamente)
        return $partidos->groupBy('ronda');
    }

    public function calcularGanador($torneo)
    {
        // Obtener el último partido finalizado
        $ultimoPartido = Partido::where('id_torneo', $torneo->id)
            ->where('finalizado', true)
            ->latest()
            ->first();

        // Si existe un ganador, lo retornamos, de lo contrario, null
        if ($ultimoPartido) {
            $ganador = $ultimoPartido->ganador;

            // Asegúrate de obtener solo el ID del ganador
            $torneo->update(['id_ganador' => $ganador->id]);

            return $ganador->id;
        }

        return null;
    }

    public function finalizar($id)
    {
        $torneo = Torneo::findOrFail($id);

        // Cambiar el estado a finalizado
        $torneo->finalizado = true;

        // Obtener el último partido del torneo
        $ultimoPartido = Partido::where('id_torneo', $id)->orderBy('fecha', 'desc')->first();

        // Obtener el id del ganador del último partido
        $id_ganador = $ultimoPartido ? $ultimoPartido->id_ganador : null;

        // Actualizar el id_ganador en la tabla torneos
        $torneo->id_ganador = $id_ganador;
        $torneo->save();

        // Redirigir a la ruta arbitro.dashboard con el mensaje de éxito
        return redirect()
            ->route('arbitro.dashboard')
            ->with('success', 'Torneo finalizado correctamente. El ID del ganador del último partido es: ' . ($id_ganador ? $id_ganador : 'No disponible'));
    }
}
