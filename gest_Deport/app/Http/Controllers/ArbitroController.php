<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ArbitroController extends Controller{
    public function dashboard(){
        return view("arbitro.dashboard");
    }
}
