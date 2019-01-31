<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Diagnostico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('diagnostico',function(Blueprint $table){
        $table->unsignedInteger('id_orden');
        $table->unsignedInteger('id_servicio');
        $table->string('nombre');
        $table->integer('cantidad');
        $table->double('subtotal',20,2);
        $table->foreign('id_orden')->references('id_orden')->on('orden');
        $table->foreign('id_servicio')->references('id_servicio')->on('servicio');
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
        Schema::dropIfExists('diagnostico');
    }
}
