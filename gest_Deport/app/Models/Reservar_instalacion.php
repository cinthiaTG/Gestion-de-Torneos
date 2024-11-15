<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservar_instalacion extends Model
{
    use HasFactory;
    protected $table = 'reservar_instalaciones';
    public function instalacion()
    {
        return $this->BelongsTo(Instalacion::class);
    }
    public function partido()
    {
        return $this->BelongsTo(Partido::class);
    }
    protected $fillable = ['fecha_reserva'];


}
