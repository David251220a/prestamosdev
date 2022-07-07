<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoSolicitudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_solicitude', function (Blueprint $table) {
            $table->id();
            $table->string('obserbacion',255);
            $table->unsignedBigInteger('solicitude_id');
            $table->unsignedBigInteger('estado_id');
            
            $table->foreign('solicitude_id')
            ->references('id')->on('solicitudes')
            ->onDelete('cascade');

            $table->foreign('estado_id')
            ->references('id')->on('estados')
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
        Schema::dropIfExists('estado_solicitude');
    }
}
