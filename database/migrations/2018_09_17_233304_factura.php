<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Factura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura',function(Blueprint $table){
          $table->increments('id_factura');
          $table->unsignedInteger('id_orden');
          $table->string('no_tramite',40);
          $table->double('importe',15,3);
          $table->date('fecha');
          $table->timestamp('updated_at')->nullable();
          $table->timestamp('created_at')->nullable();
          $table->foreign('id_orden')->references('id_orden')->on('orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
