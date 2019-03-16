<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orden',function (Blueprint $table){
        $table->increments('id_orden');
        $table->string('folio_dpa');
        $table->string('no_oficio');
        $table->date('fecha');
        $table->unsignedInteger('id_area');
        $table->unsignedInteger('id_area_dos');
        $table->string('correctivo');
        $table->string('preventivo');
        $table->string('enllantamiento');
        $table->string('refacciones');
        $table->string('mano_obra');
        $table->unsignedInteger('id_unidad');
        $table->integer('km');
        $table->unsignedInteger('id_taller');
        $table->double('importe_cotizacion', 15, 2);
        $table->string('combustible');
        $table->string('region');
        $table->date('fecha_ingreso');
        $table->date('fecha_salida');
        $table->string('estado');
        $table->unsignedInteger('id');
        $table->foreign('id_area')->references('id_area')->on('area');
        $table->foreign('id_area_dos')->references('id_area_dos')->on('areados');
        $table->foreign('id_unidad')->references('id_unidad')->on('unidad');
        $table->foreign('id_taller')->references('id_taller')->on('taller');
        $table->foreign('id')->references('id')->on('users');
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
        Schema::dropIfExists('orden');
    }
}
