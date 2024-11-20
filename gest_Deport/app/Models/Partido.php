<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_torneo', 'id_equipo_local', 'id_equipo_visitante', 'fecha', 'hora', 'lugar',
    ];

    // Relación con Torneo
    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'id_torneo');
    }

    // Relación con Equipo Local
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo_local');
    }

    // Relación con Equipo Visitante
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo_visitante');
    }
}

