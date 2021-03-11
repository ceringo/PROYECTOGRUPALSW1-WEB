<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('descripcion')->nullable();
            $table->float('precio_estandar')->nullable();
            $table->string('estado_servicio')->nullable();
            $table->string('estado')->nullable();
            $table->integer('id_especialidad')->unsigned();
            $table->integer('id_empleado')->unsigned();
            $table->foreign('id_especialidad')->references('id')->on('especialidads')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_empleado')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicios');
    }
}
