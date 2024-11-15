<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrocinador_equipo extends Model
{
    use HasFactory;

    protected $table = 'patrocinadores_equipos';

    public function patrocinador()
    {
        return $this->belongsTo(Patrocinador::class, 'id_patrocinador');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }
}
