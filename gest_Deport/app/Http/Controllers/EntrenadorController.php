<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EntrenadorController extends Controller{
    public function dashboard(){
        return view("modulos.entrenador.dashboard");
    }
}
