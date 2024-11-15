<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion_torneo extends Model
{
    use HasFactory;
    protected $table = 'clasificacion_torneos';
    protected $fillable = ['puntos','victorias','empates','derrotas'];

    public function torneo()
    {
        return $this->BelongsTo(Torneo::class);
    }
}
