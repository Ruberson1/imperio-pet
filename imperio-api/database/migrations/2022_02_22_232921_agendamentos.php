<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agendamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('servicostipo_nome')->references('nome')->on('servicostipo')->unique()->notNullable();;
            $table->foreign('clientes_nome')->references('nome')->on('clientes');
            $table->foreign('status_tipo')->references('tipo')->on('status');
            $table->integer('quantidade');
            $table->string('clientes_nome');
            $table->string('servicostipo_nome');
            $table->text('obs');
            $table->date('data');
            $table->time('hora');
            $table->string('status_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
