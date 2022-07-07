<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->char('documento', 15);
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('direccion', 200);
            $table->string('celular', 15)->nullable();
            $table->dateTime('fecha_nacimiento');
            $table->string('barrio', 100)->nullable();
            $table->unsignedBigInteger('departamentos_id');
            $table->foreign('departamentos_id')
            ->references('id')->on('departamentos')
            ->onDelete('cascade');
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
        Schema::dropIfExists('personas');
    }
}
