<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['nombre_rol'];

    //protected $table = "roles";
    //protected $fillable = ["nombre_rol"];
    //protected $guarded = ["id"];
    //protected $casts = [
    //      "Fecha" => "date"
    //  ]; Significa que la columna fecha tiene que ser tipo date
    //protected $hidden = ["contraseña"];

}
