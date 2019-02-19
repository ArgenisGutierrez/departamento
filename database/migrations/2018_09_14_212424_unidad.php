<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Unidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad',function (Blueprint $table){
          $table->increments('id_unidad');
          $table->string('marca',50);
          $table->string('tipo',150);
          $table->string('modelo',20);
          $table->string('serie',30);
          $table->string('no_economico',25);
          $table->integer('cil');
          $table->string('uso',20);
          $table->string('familia',30);

          $table->string('area',400);
          $table->string('placa',25);
          $table->string('color',50);
          $table->string('propiedad',50);
          $table->string('patrulla_civil',50);
          $table->string('ubicacion',300);
          $table->string('localidad',60);
          $table->string('adscripcion',200);
          $table->timestamp('updated_at')->nullable();
          $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad');
    }
}
