<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellido_1');
            $table->string('celular_1', 15);
            $table->string('direccion_1', 100);
            $table->string('nombre_apellido_2');
            $table->string('celular_2', 15);
            $table->string('direccion_2', 100);
            $table->unsignedBigInteger('persona_id')->unique();
            $table->foreign('persona_id')
            ->references('id')->on('personas')
            ->onDelete('cascade')
            ->onUpdate('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencias');
    }
}
