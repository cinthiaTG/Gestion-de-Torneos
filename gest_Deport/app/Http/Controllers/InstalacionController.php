<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instalacion;

class InstalacionController extends Controller
{
    public function dashboard(){//este va a ser el nuevo index
        return view("instalacion.dashboard");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_instalacion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'deporte_id' => 'required|exists:deportes,id'
        ]);

        instalacion::create([
            'nombre_instalacion' => $request->nombre_instalacion,
            'ubicacion' => $request->ubicacion,
            'id_deporte' => $request->deporte_id,
        ]);

        return redirect()->route('instalacion.create')->with('success', 'instalacion registrado exitosamente');
    }


     public function edit($id)
     {
         $instalacion = instalacion::findOrFail($id);
         return view('instalacion.edit', compact('instalacion'));
     }

     public function update(Request $request, $id)
     {
         $request->validate([
            'nombre_instalacion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
         ]);

         $instalacion = Instalacion::findOrFail($id);
         $instalacion->update([
            'nombre_instalacion' => $request->nombre_instalacion,
            'ubicacion' => $request->ubicacion,
         ]);

         return redirect()->route('instalacion.read')->with('success', 'instalacion actualizado con éxito');
     }

     public function destroy($id)
     {
         $instalacion = instalacion::findOrFail($id);
         $instalacion->delete();
         return redirect()->route('instalacion.read')->with('success', 'instalacion eliminado con éxito');
     }

     public function create()
     {
         $instalacion = Instalacion::all();
         return view('instalacion.create', ['instalacion' => $instalacion]);
     }

    public function read()
    {
        $instalaciones = instalacion::all();

        return view('instalacion.read', compact('instalaciones'));
    }
}
