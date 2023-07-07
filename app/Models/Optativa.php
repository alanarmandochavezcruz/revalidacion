<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optativa extends Model
{
    use HasFactory;

    protected $table = "optativas";
    public $timestamps = true;
    protected $fillable = [
        "id_carrera",
        "nombre"
    ];
}
