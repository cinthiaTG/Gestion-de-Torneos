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
        'escudos',
        'patrocinador_equipo',
        'monto_patrocinador',
        ];

    public function jugadores(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Jugador::class, 'id_equipo');
    }
}
