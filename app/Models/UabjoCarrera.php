<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UabjoCarrera extends Model
{
    use HasFactory;

    protected $table = "uabjo_carreras";
    public $timestamps = true;
    protected $fillable =[
        "nombre"
    ];
}
