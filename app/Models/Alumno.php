<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = "alumnos";
    public $timestamps = true;
    protected $fillable = [
        "id_carrera_universidad",
        "id_carrera_uabjo",
        "curp",
        "clave",
        "nombres",
        "apellidos",
        "sexo"
    ];
}
