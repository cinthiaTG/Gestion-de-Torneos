<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;

class EquiposController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_equipo' => 'required|string|max:50',
            'patrocinador_equipo' => 'nullable|string|max:20',
            'monto_patrocinador' => 'nullable|integer|max:1000000',
            'escudos' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Almacenar el archivo de imagen
            $path = $request->file('escudos')->store('public/escudos');
            $filename = basename($path);

            Equipo::create([
                'nombre_equipo' => $request->nombre_equipo,
                'patrocinador_equipo' => $request->patrocinador_equipo ?? 'Sin patrocinador',
                'monto_patrocinador' => $request->monto_patrocinador ?? 0,
                'escudos' => $filename,
            ]);

            return redirect()->route('equipos.read')->with('success', 'Equipo registrado exitosamente');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $equipos = Equipo::all();

        $request->validate([
            'nombre_equipo' => 'required|string|max:50',
            'patrocinador_equipo' => 'nullable|string|max:20',
            'monto_patrocinador' => 'nullable|integer|max:1000000',
            'escudos' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $equipo = Equipo::findOrFail($id);

        // Verificar si se subió un nuevo escudos
        if ($request->hasFile('escudos')) {
            // Eliminar el escudos anterior si existe
            if ($equipo->escudo) {
                Storage::delete('public/escudos/' . $equipo->escudo);
            }

            // Subir el nuevo escudos
            $path = $request->file('escudos')->store('public/escudos');
            $equipo->escudo = basename($path);
        }

        // Actualizar los datos del equipo
        $equipo->nombre_equipo = $request->nombre_equipo;
        $equipo->patrocinador_equipo = $request->patrocinador_equipo ?? 'Sin patrocinador';
        $equipo->monto_patrocinador = $request->monto_patrocinador ?? 0;
        $equipo->save();

        return redirect()->route('equipos.read')->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        Storage::delete('public/escudos/' . $equipo->escudo); // Eliminar escudos del equipo
        $equipo->delete();
        return redirect()->route('equipos.read')->with('success', 'Equipo actualizado con éxito');
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function read()
    {
        $equipos = Equipo::all();

        return view('equipos.read', compact('equipos'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $equipos = Equipo::where('nombre_equipo', 'LIKE', "%$nombre%")->get();
        foreach ($equipos as $equipo) {
            $equipo->escudo_url = asset('storage/escudos/' . $equipo->escudos);
        }

        return response()->json($equipos);
    }

    public function generarPDFEquipos(Request $request): \Illuminate\Http\Response
    {
        $equipos = Equipo::where('nombre_equipo', 'like', '%' . $request->nombre . '%')->get();

        $pdf = PDF::loadView('pdf.equipos', compact('equipos'));

        return $pdf->download('equipos.pdf');
    }
}
