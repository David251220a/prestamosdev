<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestamo_id')->nullable();
            $table->char('cuota', 2);
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->DateTime('fecha_cobro');            
            $table->decimal('monto_cobrado', 12, 0)->default(0);
            $table->decimal('descuento', 12, 0)->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->char('estado', 2);
            $table->dateTime('fecha_anulacion')->nullable();

            $table->foreign('prestamo_id')
            ->references('id')->on('prestamos')
            ->onDelete('set null');

            $table->foreign('persona_id')
            ->references('id')->on('personas')
            ->onDelete('set null');

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('cobros');
    }
}
