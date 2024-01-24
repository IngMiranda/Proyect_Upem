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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->text('nom_usuario');
            $table->text('apellido_paterno');
            $table->text('apellido_materno');
            $table->unsignedBigInteger('fk_carrera');
            $table->unsignedBigInteger('fk_modalidad');
            $table->unsignedBigInteger('fk_beca');
            $table->foreign('fk_carrera')->references('id_carrera')->on('carreras');
            $table->foreign('fk_modalidad')->references('id_modalidad')->on('modalidades');
            $table->foreign('fk_beca')->references('id_beca')->on('becas');
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
        Schema::dropIfExists('usuarios');
    }
};