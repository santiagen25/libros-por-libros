<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Libro',function (Blueprint $table) {
            $table->bigIncrements('IDLibro');
            $table->string('Autor',50);
            $table->string('Descripcion',5000);
            $table->string('Nombre',100);
            $table->string('Genero',20);
            $table->integer('ISBN')->unique();
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
        Schema::dropIfExists('Libro');
    }
}
