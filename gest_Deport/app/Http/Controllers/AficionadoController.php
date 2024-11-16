<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AficionadoController extends Controller{
    public function dashboard(){
        return view("aficionado.dashboard");
    }
}
