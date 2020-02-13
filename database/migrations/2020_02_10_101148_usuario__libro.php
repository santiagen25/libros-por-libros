<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario_Libro',function (Blueprint $table) {
            $table->bigInteger('IDLibroFK2');
            $table->foreign('IDLibroFK2')->references('IDLibro')->on('Libro');
            $table->bigInteger('IDUsuarioFK3');
            $table->foreign('IDUsuarioFK3')->references('IDUsuario')->on('Usuario');
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
        Schema::dropIfExists('Usuario_Libro');
    }
}
