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
        Schema::create('revalidacion_registros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dictamen')->unsigned();
            $table->bigInteger('universidad_carrera_materia')->unsigned();
            $table->bigInteger('universidad_carrera_optativa')->unsigned()->nullable();
            $table->bigInteger('uabjo_materia')->unsigned();
            $table->bigInteger('uabjo_optativa')->unsigned()->nullable();
            $table->foreign('dictamen')->references('id')->on('dictamen_registros');
            $table->foreign('universidad_carrera_materia')->references('id')->on('materias');
            $table->foreign('universidad_carrera_optativa')->references('id')->on('optativas');
            $table->foreign('uabjo_materia')->references('id')->on('uabjo_materias');
            $table->foreign('uabjo_optativa')->references('id')->on('uabjo_optativas');
            $table->enum('tipo_aprobacion', ["ORD", "EXT. 1", "EXT. 2", "ESP"]);
            $table->decimal('calificacion', 3,1);
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
        Schema::dropIfExists('revalidacion_registros');
    }
};
