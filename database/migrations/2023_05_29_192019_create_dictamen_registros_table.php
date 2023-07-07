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
        Schema::create('dictamen_registros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_alumno')->unsigned();
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->string('clave', 40);
            $table->string('periodo_inicio', 255);
            $table->string('periodo_fin', 255);
            $table->date('fecha_aprobacion')->nullable();
            $table->string('semestre_alumno', 255);
            $table->string('director_uabjo', 255);
            $table->string('coordinador_uabjo', 255);
            $table->string('director_escolares', 255);
            $table->string('subdirector_escolares', 255);
            $table->string('secretaria_escolares', 255);
            $table->enum('estado', ["pendiente", "aprovado"]);
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
        Schema::dropIfExists('dictamen_registros');
    }
};
