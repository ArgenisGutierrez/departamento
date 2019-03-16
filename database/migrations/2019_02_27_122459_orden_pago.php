<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenpago',function(Blueprint $table){
            $table->increments('id_orden_pago');
            $table->string('no_tramite',20);
            $table->string('area',100);
            $table->string('serie',100);
            $table->double('total',20,3);
            $table->date('fecha');
            $table->string('estado'); 
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
        Schema::dropIfExists('ordenpago');
    }
}
