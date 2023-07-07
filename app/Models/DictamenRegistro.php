<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictamenRegistro extends Model
{
    use HasFactory;
    protected $table = "dictamen_registros";
    public $timestamps = true;
    protected $fillable = [
        "id_alumno",
        "clave",
        "periodo_inicio", 
        "periodo_fin", 
        "fecha_aprobacion", 
        "semestre_alumno",
        "director_uabjo",
        "coordinador_uabjo",
        "director_escolares",
        "subdirector_escolares",
        "secretaria_escolares",
        "estado"
    ];
}