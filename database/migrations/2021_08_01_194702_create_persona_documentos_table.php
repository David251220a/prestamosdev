<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('cedula_frontal')->nullable();
            $table->string('cedula_reverso')->nullable();
            $table->string('liquidacion')->nullable();
            $table->string('factura')->nullable();
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
        Schema::dropIfExists('persona_documentos');
    }
}
