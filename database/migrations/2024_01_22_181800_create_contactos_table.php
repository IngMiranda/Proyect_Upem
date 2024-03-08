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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id('id_contactos');
            $table->string('num_celular');
            $table->string('num_telefono');
            $table->unsignedBigInteger('fk_plantel');
            $table->unsignedBigInteger('fk_usuario');
            $table->unsignedBigInteger('fk_correo');
            $table->foreign('fk_plantel')->references('id_plantel')->on('planteles');
            $table->foreign('fk_usuario')->references('id_matricula')->on('usuarios');
            $table->foreign('fk_correo')->references('id')->on('users');
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
        Schema::dropIfExists('contactos');
    }
};
