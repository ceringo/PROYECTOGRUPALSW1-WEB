<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpleadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleadors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('calificacion_empleador')->unsigned();
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
        Schema::drop('empleadors');
    }
}
