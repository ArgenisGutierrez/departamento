<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dictamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictamen',function(Blueprint $table){
          $table->increments('id');
          $table->string('jefe_oficina');
          $table->string('jefe_departamento');
          $table->string('jefe_unidad');
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
        Schema::dropIfExists('dictamen');
    }
}
