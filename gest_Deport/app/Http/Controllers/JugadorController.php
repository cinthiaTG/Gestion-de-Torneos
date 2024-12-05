<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Equipo;


class JugadorController extends Controller{
    public function dashboard()
    {
        $usuario = auth()->user();
        $jugadores = Jugador::where('nombre', $usuario->name)->get();
        return view("jugador.dashboard", compact('jugadores'));
    }



public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'edad' => 'required|integer',
        'equipo_id' => 'required|exists:equipos,id',
        'posicion' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email', // Asegúrate de capturar el email
    ]);

    // Crear el jugador
    $jugador = Jugador::create([
        'nombre' => $request->nombre,
        'edad' => $request->edad,
        'id_equipo' => $request->equipo_id,
        'posicion' => $request->posicion,
    ]);

    // Crear el usuario asociado al jugador
    $user = User::create([
        'name' => $request->nombre,
        'email' => $request->email,
        'password' => bcrypt('jugador123'), // Contraseña temporal
        'rol_id' => 3, // Rol de jugador
    ]);

    return redirect()->route('jugador.read')->with('success', 'Jugador y usuario creados exitosamente');
}



    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugador.edit', compact('jugador'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'posicion' => 'required',

        ]);

        $jugador = Jugador::findOrFail($id);
        $jugador->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'posicion' => $request->posicion,

        ]);

        return redirect()->route('jugador.read')->with('success', 'Jugador actualizado con éxito');
    }

    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->delete();
        return redirect()->route('jugador.read')->with('success', 'Jugador eliminado con éxito');
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('jugador.create', ['equipos' => $equipos]);
    }

    public function read()
    {
        $jugadores = Jugador::all();

        return view('jugador.read', compact('jugadores'));
    }
    public function estadisticas_team($id)
    {
        // Obtener el equipo según su ID
        $equipo = Equipo::findOrFail($id);

        // Obtener los jugadores asociados al equipo
        $jugadores = Jugador::where('id_equipo', $id)->get();

        // Retornar la vista con los datos del equipo y sus jugadores
        return view('jugador.estadisticas_equipo', compact('equipo', 'jugadores'));
    }
    public function desempeño()
    {
        $jugadores = Jugador::all();

        return view('jugador.desempeño', compact('jugadores'));
    }
    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $jugadores = Jugador::where('nombre', 'LIKE', "%$nombre%")
            ->get();

        return response()->json($jugadores);
    }

    public function generarPDFJugadores(Request $request): \Illuminate\Http\Response
    {
        $jugadores = Jugador::where('nombre', 'like', '%' . $request->nombre . '%')->get();

        $pdf = PDF::loadView('pdf.jugadores', compact('jugadores'));

        return $pdf->download('jugadores.pdf');
    }
}

