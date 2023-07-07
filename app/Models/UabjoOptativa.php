<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UabjoOptativa extends Model
{
    use HasFactory;

     protected $table = "uabjo_optativas";
     public $timestamps = true;
     protected $fillable = [
        "id_uabjo_carrera",
        "nombre"
     ];
}
