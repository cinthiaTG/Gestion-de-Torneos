<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Instalacion;
use App\Models\Deporte;
use Illuminate\Http\Request;


class InstalacionController extends Controller
{
    public function dashboard()
    {
        return view('instalacion.dashboard');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_instalacion' => 'required|string|max:50|unique:instalaciones,nombre_instalacion',
            'ubicacion' => 'required|string|max:50',
        ], [
            'nombre_instalacion.unique' => 'El nombre de la instalación ya está registrado.',
        ]);

        Instalacion::create([
            'nombre_instalacion' => $request->nombre_instalacion,
            'ubicacion' => $request->ubicacion,
        ]);

        return redirect()->route('instalacion.read')->with('success', 'Instalación registrada con éxito');
    }

    public function edit($id)
    {
        $instalacion = Instalacion::findOrFail($id);
        return view('instalacion.edit', compact('instalacion'));
    }

    public function update(Request $request, $id)
    {
        $instalacion = Instalacion::findOrFail($id);

        $validatedData = $request->validate([
            'nombre_instalacion' => 'required|string|max:50|unique:instalaciones,nombre_instalacion,' . $id,
            'ubicacion' => 'required|string|max:50',
        ], [
            'nombre_instalacion.unique' => 'El nombre de la instalación ya está registrado.',
        ]);

        $instalacion->update([
            'nombre_instalacion' => $request->nombre_instalacion,
            'ubicacion' => $request->ubicacion,
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
        $instalaciones = Instalacion::where('nombre_instalacion', 'LIKE', "%$nombre%")->get();

        return response()->json($instalaciones);
    }

    public function generarPDFInstalaciones(Request $request): \Illuminate\Http\Response
    {
        $instalaciones = Instalacion::where('nombre_instalacion', 'like', '%' . $request->nombre . '%')->get();

        $pdf = PDF::loadView('pdf.instalaciones', compact('instalaciones'));

        return $pdf->download('instalaciones.pdf');
    }
}
