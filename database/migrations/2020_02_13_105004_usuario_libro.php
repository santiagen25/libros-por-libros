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
            $table->bigInteger('IDLibroFK2')->unsigned();
            $table->foreign('IDLibroFK2')->references('IDLibro')->on('Libro')->onDelete('cascade');
            $table->bigInteger('IDUsuarioFK3')->unsigned();
            $table->foreign('IDUsuarioFK3')->references('IDUsuario')->on('Usuario')->onDelete('cascade');
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
