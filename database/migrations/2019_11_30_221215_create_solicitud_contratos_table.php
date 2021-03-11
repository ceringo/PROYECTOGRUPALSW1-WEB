<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('latitud_empleador')->nullable();
            $table->string('longitud_empleador')->nullable();
            $table->date('fecha')->nullable();
            $table->string('estado_solicitud')->nullable();
            $table->string('estado')->nullable();
            $table->integer('id_empleador')->unsigned();
            $table->integer('id_servicio')->unsigned();
            $table->foreign('id_empleador')->references('id')->on('empleadors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('solicitud_contratos');
    }
}
