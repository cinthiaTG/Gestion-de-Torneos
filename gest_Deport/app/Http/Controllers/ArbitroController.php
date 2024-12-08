<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Equipo;
use App\Models\Jugador;

class ArbitroController extends Controller
{
    public function dashboard()
    {
        // Obtener los torneos activos
        $torneos = Torneo::where('finalizado', false)->get();

        // Obtener los torneos finalizados
        $torneosInactivos = Torneo::where('finalizado', true)->get();

        // Obtener todos los equipos
        $equipos = Equipo::all();

        // Pasar los torneos activos, los inactivos y los equipos a la vista
        return view('arbitro.dashboard', compact('equipos', 'torneos', 'torneosInactivos'));
    }

    public function jugadores($id)
    {
        // Recuperar el equipo con sus jugadores asociados
        $equipo = Equipo::with('jugadores')->findOrFail($id);

        // Pasar el equipo y los jugadores a la vista
        return view('arbitro.jugadores', compact('equipo'));
    }

    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        $equipo = $jugador->equipo;
        return view('arbitro.edit', compact('jugador', 'equipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'puntos' => 'required|integer',
            'asistencias' => 'required|integer',
            'tarjetas_amarillas' => 'required|integer',
            'tarjetas_rojas' => 'required|integer',
            'faltas' => 'required|integer',
        ]);

        $jugador = Jugador::findOrFail($id);

        $jugador->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'puntos' => $request->puntos,
            'asistencias' => $request->asistencias,
            'tarjetas_amarillas' => $request->tarjetas_amarillas,
            'tarjetas_rojas' => $request->tarjetas_rojas,
            'faltas' => $request->faltas,
        ]);

        return redirect()
            ->route('arbitro.jugadores', ['id' => $jugador->id_equipo])
            ->with('success', 'Jugador actualizado con éxito');
    }
}
