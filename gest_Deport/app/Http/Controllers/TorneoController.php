<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Torneo;
use App\Models\Jugador;
use App\Models\Equipo;


class TorneoController extends Controller{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_torneo' => 'required|string|max:20',
            'patrocinador_torneo' => 'nullable|string|max:20',
            'monto_patrocinador' => 'nullable|integer|min:0|max:1000000',
            'numero_equipos' => 'required|integer|in:4,8,16',
        ], [
            'nombre_torneo.required' => 'El nombre del torneo es obligatorio.',
            'nombre_torneo.max' => 'El nombre del torneo no puede exceder los 20 caracteres.',
            'numero_equipos.in' => 'El número de equipos debe ser 4, 8 o 16.',
        ]);

        try{

        Torneo::create([
            'nombre_torneo'  => $request->nombre_torneo,
            'patrocinador_torneo' => $request->patrocinador_torneo ?? 'Sin patrocinador',
            'monto_patrocinador' => $request->monto_patrocinador ?? 0,
            'numero_equipos'  => $request->numero_equipos,

        ]);

        return redirect()->route('torneo.read')->with('success', 'Torneo registrado exitosamente');
    } catch (\Exception $e){
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
        $validatedData = $request->validate([
            'nombre_torneo' => 'required|string|max:20',
            'patrocinador_torneo' => 'nullable|string|max:20',
            'monto_patrocinador' => 'nullable|integer|min:0|max:1000000',
        ], [
            'nombre_torneo.required' => 'El nombre del torneo es obligatorio.',
            'nombre_torneo.max' => 'El nombre del torneo no puede exceder los 20 caracteres.',
        ]);


        $torneo = Torneo::findOrFail($id);
        $torneo->update([
            'nombre_torneo' => $request->nombre_torneo,
            'patrocinador_torneo'=>$request->patrocinador_torneo ?? 'Sin patrocinador',
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
        $torneos = Torneo::where('nombre_torneo', 'LIKE', "%$nombre%")
            ->get();
        return response()->json($torneos);
    }

    public function generarPDFTorneos(Request $request): \Illuminate\Http\Response
    {
        $torneos = Torneo::where('nombre_torneo', 'like', '%' . $request->nombre . '%')->get();

        $pdf = PDF::loadView('pdf.torneos', compact('torneos'));

        return $pdf->download('torneos.pdf');
    }
}
