<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class JugadorController extends Controller{
    public function dashboard(){
        return view("jugador.dashboard");
    }
}
