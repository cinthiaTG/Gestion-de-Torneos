<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';
    protected $fillable = [
        'nombre_equipo',
        'escudo',
        'patrocinador_equipo',
        'monto_patrocinador',
        'partidos_jugados',
        'victorias',
        'empates',
        'derrotas',
        'goles_favor',
        'goles_contra',
        'diferencia_goles',//goles_favor - goles_contra
        'puntos',//victorias * 3 + empates
        'id_deporte',
        ];

    public function jugadores(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Jugador::class, 'id_equipo');
    }
}
