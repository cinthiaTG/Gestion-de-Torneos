<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partido;


class EntrenadorController extends Controller{
    public function dashboard(){
        $partidos = Partido::all();
        return view("entrenador.dashboard", compact('partidos'));
    }

    
}
