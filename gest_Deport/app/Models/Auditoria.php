<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;
    protected $table = 'auditorias';
    protected $fillable = ['accion','fecha_hora','modulo'];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
