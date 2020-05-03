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
            $table->string('Email',100)->unique();
            $table->dateTime('Nacimiento');
            $table->boolean('Bloqueado');
            $table->string('Password',500); //es necesario que sea un numero alto, ya que cuando se hashea una password te queda un numero enorme
            //$table->string('Imagen',100)->nullable()->autoIncrement();
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
        Schema::dropIfExists('Usuario');
    }
}
