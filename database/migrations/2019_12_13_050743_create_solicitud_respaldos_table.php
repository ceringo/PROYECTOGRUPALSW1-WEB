<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudRespaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_respaldos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('foto')->nullable();
            $table->string('curriculum')->nullable();
            $table->string('antecedentes_penales')->nullable();
            $table->string('foto_ci')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('estado')->nullable();
            $table->integer('id_servicio')->unsigned();
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
        Schema::drop('solicitud_respaldos');
    }
}
