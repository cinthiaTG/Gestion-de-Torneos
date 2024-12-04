<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_torneo',
        'id_equipo_local',
        'id_equipo_visitante',
        'id_instalacion',
        'fecha',
        'hora',
        'finalizado',
        'id_ganador',
        'ronda',
    ];


    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'id_torneo');
    }

    public function ganador()
    {
        return $this->belongsTo(Equipo::class, 'id_ganador');
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

    // Relación con Instalacion
    public function instalacion()
    {
        return $this->belongsTo(Instalacion::class, 'id_instalacion');
    }
}
