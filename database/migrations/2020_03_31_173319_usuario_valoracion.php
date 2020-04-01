<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioValoracion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario_Valoracion',function (Blueprint $table) {
            $table->bigInteger('IDUsuarioFK4')->unsigned();
            $table->foreign('IDUsuarioFK4')->references('IDUsuario')->on('Usuario')->onDelete('cascade');
            $table->bigInteger('IDValoracionFK3')->unsigned();
            $table->foreign('IDValoracionFK3')->references('IDValoracion')->on('Valoracion')->onDelete('cascade');
            $table->string('IDMezcla')->unique(); //este ID será el IDUsuario_IDValoracion
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
        Schema::dropIfExists('Usuario_Valoracion');
    }
}
