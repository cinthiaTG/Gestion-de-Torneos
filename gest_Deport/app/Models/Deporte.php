<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;
    protected $table = 'deportes';
    protected $fillable = ['nombre_deporte'];
    public function instalacion(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Instalacion::class, 'id_instalacion');
    }

}
