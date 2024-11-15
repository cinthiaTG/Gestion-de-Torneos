<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller{
    public function index(){
        return view("modulos.dashboard.index");
                // Esta retortnando una vista obviamente

    }
}
