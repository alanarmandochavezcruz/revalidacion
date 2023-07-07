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
        Schema::create('optativas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_carrera')->unsigned();
            $table->foreign('id_carrera')->references('id')->on('carreras');
            $table->string('nombre', 255);
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
        Schema::dropIfExists('optativas');
    }
};
