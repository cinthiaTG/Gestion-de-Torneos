<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrocinadores_torneos extends Model
{
    use HasFactory;
    protected $table = 'patrocinadores_torneos';
    public function patrocinador()
    {
        return $this->belongsTo(Patrocinador::class);
    }

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }
}
