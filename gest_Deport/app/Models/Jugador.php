<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Jugador extends Model
{
    use HasFactory;
    protected $table = "jugadores";
    protected $fillable = [
        'nombre',
        'edad',
        'id_equipo',
    // 'puntos',
    // 'asistencias',
    // 'tarjetas_amarillas',
    // 'tarjetas_rojas',
    // 'faltas',
    // 'minutos_jugados',
    // 'partidos_jugados',
    // 'goles_contra',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }


    public function deporte()
    {
        return $this->belongsTo(Deporte::class);
    }

}
