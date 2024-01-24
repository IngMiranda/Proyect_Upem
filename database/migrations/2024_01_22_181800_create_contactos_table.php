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
            $table->string('correo');
            $table->string('num_celular');
            $table->string('num_telefono');
            $table->unsignedBigInteger('fk_plantel');
            $table->unsignedBigInteger('fk_usuario');
            $table->foreign('fk_plantel')->references('id_plantel')->on('planteles'); 
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
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
