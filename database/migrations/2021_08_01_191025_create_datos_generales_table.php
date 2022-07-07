<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales', function (Blueprint $table) {
            $table->id();
            $table->string('lugar_trabajo', 80);
            $table->decimal('salario', 12, 0);
            $table->string('celular_trabajo', 15)->nullable();
            $table->string('direccion_trabajo', 100)->nullable();
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
        Schema::dropIfExists('datos_generales');
    }
}
