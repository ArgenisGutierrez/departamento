<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Archivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos',function(Blueprint $table){
          $table->increments('id_archivo');
          $table->unsignedInteger('id_orden');
          $table->string('oficio_solicitud_pdf');
          $table->string('cotizacion_pdf');
          $table->string('dictamen_tecnico_pdf');
          $table->string('factura_pdf');
          $table->string('acuse_recibo_area_pdf');
          $table->string('oficio_solicitud_xml');
          $table->string('cotizacion_xml');
          $table->string('dictamen_tecnico_xml');
          $table->string('factura_xml');
          $table->string('acuse_recibo_area_xml');
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
        Schema::dropIfExists('archivos');
    }
}
