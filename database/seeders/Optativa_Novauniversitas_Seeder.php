<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Optativa;

class Optativa_Novauniversitas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Optativa::create(['id_carrera' => '1', 'nombre' => 'Administración de Negocios I']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Tecnologías de Información I']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Sistemas de Información I']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Inteligencia Artificial I']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Matemáticas Aplicadas I']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Administración de Negocios II']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Tecnologías de Información II']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Sistemas de Información II']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Inteligencia Artificial II']);
Optativa::create(['id_carrera' => '1', 'nombre' => 'Matemáticas Aplicadas II']);
    }
}
