<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->integer('id_usuario_movil')->unsigned();
            $table->foreign('id_usuario_movil')->references('id')->on('usuario_movils')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ubicacions');
    }
}
