<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultados_partido extends Model
{
    use HasFactory;
    protected $table = 'resultados_partidos';
    protected $fillable = ['goles_locales','goles_visitantes'];
    public function partido()
    {
        return $this-> BelongsTo(Partido::class);
    }
}
