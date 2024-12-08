<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Equipo;
use App\Models\Partido;

class JugadorController extends Controller
{
    // Dashboard del jugador autenticado
    public function dashboard()
    {
        $usuario = auth()->user();
        $jugadores = Jugador::where('nombre', $usuario->name)->get();
        return view('jugador.dashboard', compact('jugadores'));
    }

    // Crear jugador
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:70|unique:jugadores,nombre',
            'edad' => 'required|integer|min:5|max:100',
            'equipo_id' => 'required|exists:equipos,id',
            'email' => 'required|email|unique:users,email',
        ]);

        // Verificar límite de jugadores en el equipo
        $equipo = Equipo::findOrFail($request->equipo_id);

        if ($equipo->jugadores()->count() >= 23) {
            return redirect()->back()->with('error', 'El equipo ya tiene 23 jugadores.');
        }

        // Crear el jugador
        $jugador = Jugador::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'id_equipo' => $request->equipo_id,
        ]);

        // Crear el usuario asociado al jugador
        User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt('jugador123'), // Contraseña temporal
            'rol_id' => 3, // Rol de jugador
        ]);

        return redirect()->route('jugador.read')->with('success', 'Jugador y usuario creados exitosamente.');
    }

    // Mostrar formulario para editar un jugador
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugador.edit', compact('jugador'));
    }

    // Actualizar jugador
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => "required|string|max:70|unique:jugadores,nombre,$id",
            'edad' => 'required|integer|min:5|max:100',
        ]);

        $jugador = Jugador::findOrFail($id);
        $jugador->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
        ]);

        return redirect()->route('jugador.read')->with('success', 'Jugador actualizado con éxito.');
    }

    // Eliminar jugador
    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->delete();

        return redirect()->route('jugador.read')->with('success', 'Jugador eliminado con éxito.');
    }

    // Mostrar formulario de creación de jugadores
    public function create()
    {
        $equipos = Equipo::all();
        return view('jugador.create', ['equipos' => $equipos]);
    }

    // Mostrar lista de jugadores
    public function read()
    {
        $jugadores = Jugador::all();
        return view('jugador.read', compact('jugadores'));
    }

    public function estadisticas_team($id)
    {
        // Obtener el equipo por ID
        $equipo = Equipo::findOrFail($id);

        // Obtener el jugador autenticado (por nombre)
        $usuario = auth()->user();
        $jugador = Jugador::where('nombre', $usuario->name)->first(); // Buscar jugador por nombre del usuario

        if (!$jugador) {
            // Si no existe un jugador con el nombre del usuario
            return redirect()->route('jugador.dashboard')->with('error', 'No se encontró un jugador con tu nombre.');
        }

        // Obtener el equipo al que pertenece el jugador
        $equipoDelJugador = $jugador->equipo; // Relación de Equipo con Jugador

        // Verificar si el jugador pertenece al equipo solicitado
        if ($equipoDelJugador->id !== $equipo->id) {
            // Si el equipo del jugador no coincide con el equipo solicitado
            return redirect()->route('jugador.dashboard')->with('error', 'Este no es tu equipo.');
        }

        // Filtrar los partidos en los que el equipo ha jugado como local o visitante
        $partidosFinalizados = Partido::where(function ($query) use ($id) {
            $query->where('id_equipo_local', $id)->orWhere('id_equipo_visitante', $id);
        })->get();

        return view('jugador.estadisticas_equipo', compact('equipo', 'partidosFinalizados'));
    }

    // Ver desempeño de todos los jugadores
    public function desempeño()
    {
        $jugadores = Jugador::all();
        return view('jugador.desempeño', compact('jugadores'));
    }

    // Buscar jugadores por nombre
    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $jugadores = Jugador::where('nombre', 'LIKE', "%$nombre%")->get();
        return response()->json($jugadores);
    }

    // Generar PDF con jugadores
    public function generarPDFJugadores(Request $request): \Illuminate\Http\Response
    {
        $jugadores = Jugador::where('nombre', 'like', '%' . $request->nombre . '%')->get();
        $pdf = PDF::loadView('pdf.jugadores', compact('jugadores'));

        return $pdf->download('jugadores.pdf');
    }
}
