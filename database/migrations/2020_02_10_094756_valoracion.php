<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Valoracion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Valoracion',function (Blueprint $table) {
            $table->bigIncrements('IDValoracion');
            $table->string('Titulo',50);
            $table->string('Comentario',500);
            $table->integer('Puntuacion');
            $table->integer('IDLibro');
            $table->integer('IDUsuario');
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
        Schema::dropIfExists('Valoracion');
    }
}
