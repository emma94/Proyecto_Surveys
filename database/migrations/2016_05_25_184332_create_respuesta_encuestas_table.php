<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_encuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEncuesta');
            $table->integer('idPregunta');
            $table->text('respuesta');
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
        Schema::drop('respuesta_encuestas');
    }
}
