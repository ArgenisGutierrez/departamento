<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detallepago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepago',function(Blueprint $table){
            $table->increments('id_detallepago');
            $table->unsignedInteger('id_orden_pago');
            $table->string('folio',100);
            $table->double('importe',20,3);
            $table->date('fecha_pago');
            $table->foreign('id_orden_pago')->references('id_orden_pago')->on('ordenpago');
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
        Schema::dropIfExists('detallepago');
    }
}
