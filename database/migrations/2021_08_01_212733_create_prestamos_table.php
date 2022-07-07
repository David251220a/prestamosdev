<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_prestamo');
            $table->integer('anio');
            $table->integer('numero_expediente');
            $table->decimal('monto_prestamo', 12, 0);
            $table->char('plazo', 2);
            $table->char('estado', 2)->default('A');
            $table->unsignedBigInteger('solicitude_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->unsignedBigInteger('tasa_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('solicitude_id')
            ->references('id')->on('solicitudes')
            ->onDelete('set null');

            $table->foreign('persona_id')
            ->references('id')->on('personas')
            ->onDelete('set null');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('set null');

            $table->foreign('producto_id')
            ->references('id')->on('productos')
            ->onDelete('set null');

            $table->foreign('tasa_id')
            ->references('id')->on('tasas')
            ->onDelete('set null');

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
        Schema::dropIfExists('prestamos');
    }
}
