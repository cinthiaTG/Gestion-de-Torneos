<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteController extends Controller
{
    public function buscar(Request $request)
    {
        $id = $request->input('id');
        $deporte = Deporte::find($id);

        if ($deporte) {
            return response()->json($deporte);
        } else {
            return response()->json(['mensaje' => 'Deporte no encontrado'], 404);
        }
    }
}
