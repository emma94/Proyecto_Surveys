<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEncuesta')->unsigned();
            $table->integer('idTag')->unsigned();
            $table->foreign('idEncuesta')->references('id')->on('encuestas');
            $table->foreign('idTag')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('encuestas_tags');
    }
}
