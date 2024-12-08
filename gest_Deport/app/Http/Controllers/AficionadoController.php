<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partido;


class AficionadoController extends Controller
{
    public function dashboard()
    {

        // Recuperar partidos finalizados con las relaciones de equipos
        $partidosFinalizados = Partido::with(['equipoLocal', 'equipoVisitante'])->where('finalizado', 1)->get();

        // Pasar los partidos a la vista
        return view('aficionado.dashboard', compact('partidosFinalizados'));
    }
}
