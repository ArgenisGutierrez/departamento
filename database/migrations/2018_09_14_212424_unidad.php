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
          $table->string('tipo',30);
          $table->string('placa',30);
          $table->string('modelo',20);
          $table->string('serie',20);
          $table->string('no_economico',10)->unique();
          $table->integer('cil');
          $table->string('uso',20);
          $table->string('familia',30);
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
