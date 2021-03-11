<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('calificacion_empleado')->unsigned();
            $table->string('estado_respaldo')->nullable();
            $table->string('estado')->nullable();
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
        Schema::drop('empleados');
    }
}
