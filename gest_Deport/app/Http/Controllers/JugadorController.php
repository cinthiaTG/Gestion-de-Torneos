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
    $jugadores = Jugador::all(); // Obtener todos los jugadores
    return view("jugador.dashboard", compact('jugadores')); // Pasar los datos a la vista
}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'edad' => 'required|integer',
            'equipo_id' => 'required|exists:equipos,id',
            'posicion' => 'required|string|max:255',
            // 'puntos' => 'required|integer',
            // 'asistencias' => 'required|integer',
            // 'tarjetas_rojas' => 'required|integer',
            // 'tarjetas_amarillas' => 'required|integer',
            // 'faltas' => 'required|integer',
        ]);
        try{
        Jugador::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'edad' => $request->edad,
            'id_equipo' => $request->equipo_id,
            'posicion' => $request->posicion,
            // 'puntos' => $request->puntos,
            // 'asistencias' => $request->asistencias,
            // 'tarjetas_rojas' => $request->tarjetas_rojas,
            // 'tarjetas_amarillas' => $request->tarjetas_amarillas,
            // 'faltas' => $request->faltas,
            // 'id_deporte' => $request->id_deporte,
        ]);

        return redirect()->route('jugadores.read')->with('success', 'Jugador registrado exitosamente');
    } catch (\Exception $e){
        dd($e->getMessage());
    }
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
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'edad' => 'required|integer',
            'posicion' => 'required',
            'puntos' => 'required|integer',
            'asistencias' => 'required|integer',
            'tarjetas_amarillas' => 'required|integer',
            'tarjetas_rojas' => 'required|integer',
            'faltas' => 'required|integer',
        ]);

        $jugador = Jugador::findOrFail($id);
        $jugador->update([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'edad' => $request->edad,
            'posicion' => $request->posicion,
            'puntos' => $request->puntos,
            'asistencias' => $request->asistencias,
            'tarjetas_amarillas' => $request->tarjetas_amarillas,
            'tarjetas_rojas' => $request->tarjetas_rojas,
            'faltas' => $request->faltas,
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

