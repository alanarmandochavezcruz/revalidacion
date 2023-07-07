<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uabjo_materias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_uabjo_carrera')->unsigned();
            $table->foreign('id_uabjo_carrera')->references('id')->on('uabjo_carreras');
            $table->string('nombre', 255);
            $table->enum('tipo', ["materia", "optativa"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uabjo_materias');
    }
};
