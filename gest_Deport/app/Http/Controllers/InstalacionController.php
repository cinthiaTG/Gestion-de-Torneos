<?php

namespace App\Http\Controllers;

use App\Models\Instalacion;
use App\Models\Deporte;
use Illuminate\Http\Request;

class InstalacionController extends Controller
{
    public function dashboard()
    {
        return view("instalacion.dashboard");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_instalacion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'id_deporte' => 'required|exists:deportes,id', // Asegúrate de que exista la relación
        ]);

        Instalacion::create([
            'nombre_instalacion' => $request->nombre_instalacion,
            'ubicacion' => $request->ubicacion,
            'id_deporte' => $request->id_deporte,
        ]);

        return redirect()->route('instalacion.create')->with('success', 'Instalación registrada exitosamente');
    }

    public function edit($id)
    {
        $instalacion = Instalacion::findOrFail($id);
        return view('instalacion.edit', compact('instalacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_instalacion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'id_deporte' => 'required|exists:deportes,id',
        ]);

        $instalacion = Instalacion::findOrFail($id);
        $instalacion->update([
            'nombre_instalacion' => $request->nombre_instalacion,
            'ubicacion' => $request->ubicacion,
            'id_deporte' => $request->id_deporte,
        ]);

        return redirect()->route('instalacion.read')->with('success', 'Instalación actualizada con éxito');
    }

    public function destroy($id)
    {
        $instalacion = Instalacion::findOrFail($id);
        $instalacion->delete();
        return redirect()->route('instalacion.read')->with('success', 'Instalación eliminada con éxito');
    }

    public function create()
    {
        $deportes = Deporte::all();
        return view('instalacion.create', ['deportes' => $deportes]);
    }

    public function read()
    {
        $instalaciones = Instalacion::all();
        return view('instalacion.read', compact('instalaciones'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $instalaciones = Instalacion::where('nombre_instalacion', 'LIKE', '%' . $nombre . '%')
            ->with('deporte')
            ->get();

        return response()->json($instalaciones);
    }


    public function generarPDF(Request $request): \Illuminate\Http\Response
    {
        $instalaciones = Instalacion::all();

        $pdf = PDF::loadView('pdf.instalaciones', compact('instalaciones'));

        return $pdf->download('instalaciones.pdf');
    }

}

