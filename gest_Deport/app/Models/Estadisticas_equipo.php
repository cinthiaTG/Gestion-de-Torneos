<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadisticas_equipo extends Model
{
    use HasFactory;
    protected $table = 'estadisticas_equipos';
    protected $fillable = ['partidos_jugados','victorias','empates','derrotas','diferencias_goles'];
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
