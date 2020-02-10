<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario',function (Blueprint $table) {
            $table->bigIncrements('IDUsuario');
            $table->boolean('esAdmin');
            $table->string('Nombre',50);
            $table->string('Direccion',50);
            $table->dateTime('Nacimiento');
            $table->boolean('Bloqueado');
            $table->string('Passwd',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuario');
    }
}