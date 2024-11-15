<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  protected $fillable = [
    "nombre",
    "email",
    "contraseña",
    "activo",
    "rol_id"

  ];
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
}
