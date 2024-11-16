<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model // O usa 'Role' si prefieres en inglés
{
    use HasFactory;

    // Si la tabla tiene un nombre diferente, especifica el nombre de la tabla
    protected $table = 'roles';

    // Campos que se pueden asignar masivamente
    protected $fillable = ['nombre_rol'];

    /**
     * Relación uno a muchos: Un rol puede tener muchos usuarios.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'rol_id');  // Relación inversa con el modelo 'User'
    }
}
