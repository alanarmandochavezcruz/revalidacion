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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_carrera_universidad')->unsigned();
            $table->bigInteger('id_carrera_uabjo')->unsigned();
            $table->string('curp', 18)->unique();
            $table->string('clave', 6)->unique();
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->enum('sexo', ["hombre", "mujer"]);
            $table->foreign('id_carrera_universidad')->references('id')->on('carreras');
            $table->foreign('id_carrera_uabjo')->references('id')->on('uabjo_carreras');
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
        Schema::dropIfExists('alumnos');
    }
};
