<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Taller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller',function (Blueprint $table){
          $table->increments('id_taller');
          $table->string('nombre',70);
          $table->string('sucursal',50);
          $table->string('telefono',12);
          $table->string('correo',50);
          $table->string('logo')->nullable();
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
      Schema::dropIfExists('taller');
    }
}
