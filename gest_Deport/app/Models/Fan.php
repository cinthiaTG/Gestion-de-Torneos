<?php

namespace Modules\Sigi\Entities;

use Illuminate\Database\Eloquent\Model;

define('ms064_tableCampus', getenv('PREFIJO_AMBIENTE') . "ms064.cat_campus");

class Campus extends Model{
  protected $table = ms064_tableCampus;
  protected $primaryKey = "cve_cat_campus";
  protected $fillable = [
    "cve_cat_campus",
    "campus",
    "cve_usuario",
    "activo",
    
  ];
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
}