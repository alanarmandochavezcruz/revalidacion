<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UabjoCarrera;

class UabjoCarrera_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UabjoCarrera::create(['nombre'=>'Licenciatura en Computación']);
    }
}
