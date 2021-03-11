<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('latitud_empleado')->nullable();
            $table->string('longitud_empleado')->nullable();
            $table->integer('calificacion_empleado')->unsigned();
            $table->integer('calificacion_empleador')->unsigned();
            $table->string('estado_contrato')->nullable();
            $table->string('estado')->nullable();
            $table->integer('id_solicitud_contrato')->unsigned();
            $table->integer('id_servicio')->unsigned();
            $table->foreign('id_solicitud_contrato')->references('id')->on('solicitud_contratos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('contratos');
    }
}
