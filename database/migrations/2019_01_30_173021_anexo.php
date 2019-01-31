<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anexo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('anexo',function(Blueprint $table){
        $table->increments('id_anexo');
        $table->string('marca');
        $table->string('tipo');
        $table->string('modelo');
        $table->integer('cil');
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
        Schema::dropIfExists('anexo');
    }
}
