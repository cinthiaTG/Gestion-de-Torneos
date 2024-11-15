<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $table = 'partidos';
    protected $fillable =['fecha','hora','lugar'];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    public function equipo_local()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function equipo_visitante()
    {
        return $this->belongsTo(Equipo::class);
    }
}
