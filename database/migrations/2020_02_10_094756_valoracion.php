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
            $table->bigIncrements('IDValoracion')->primary();
            $table->string('Titulo',50);
            $table->string('Comentario',500);
            $table->integer('Puntuacion');
            $table->bigInteger('IDLibroFK')->unsigned();
            $table->foreign('IDLibroFK')->references('IDLibro')->on('Libro');
            $table->bigInteger('IDUsuarioFK')->unsigned();
            $table->foreign('IDUsuarioFK')->references('IDUsuario')->on('Usuario');
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
