<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevalidacionRegistro extends Model
{
    use HasFactory;
    protected $table = "revalidacion_registros";
    public $timestamps = true;
    protected $fillable = [
        "dictamen", 
        "universidad_carrera_materia", 
        "universidad_carrera_optativa", 
        "uabjo_materia", 
        "uabjo_optativa", 
        "tipo_aprobacion",
        "calificacion"
    ];
}
