<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('servicio',function(Blueprint $table){
        $table->increments('id_servicio');
        $table->unsignedInteger('id_anexo');
        $table->string('nombre');
        $table->double('mano_obre',20,2);
        $table->double('refaccion',20,2);
        $table->string('unidad_medida');
        $table->foreign('id_anexo')->references('id_anexo')->on('anexo');
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
        Schema::dropIfExists('servicio');
    }
}
