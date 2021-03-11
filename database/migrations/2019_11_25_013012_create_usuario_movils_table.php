<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioMovilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_movils', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('foto')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('sexo');
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->string('estado')->nullable();
            $table->integer('id_login')->unsigned();
            $table->foreign('id_login')->references('id')->on('logins')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario_movils');
    }
}
