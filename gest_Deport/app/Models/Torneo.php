<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    protected $table = 'torneos';
    protected $fillable = ['nombre_torneo', 'monto_patrocinador', 'patrocinador_torneo', 'numero_equipos', 'finalizado', 'id_ganador'];
    public function deporte()
    {
        return $this->belongsTo(Deporte::class);
    }
}
