<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    protected $table = 'torneos';
    protected $fillable = ['nombre_torneo','tipo_torneo','numero_equipos', 'deporte_id'];
    public function deporte()
    {
        return $this->belongsTo(Deporte::class);
    }
}
