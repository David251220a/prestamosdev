<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('cuota');
            $table->dateTime('fecha_vencimiento');
            $table->decimal('monto_cuota', 12, 0);
            $table->decimal('capital', 12, 0);
            $table->decimal('interes', 12, 0);
            $table->decimal('iva', 12, 0)->default(0);
            $table->decimal('multa', 12, 0)->default(0);
            $table->dateTime('fecha_cobro')->nullable();
            $table->decimal('cobrado_capital', 12, 0)->default(0);
            $table->decimal('cobrado_interes', 12, 0)->default(0);
            $table->decimal('cobrado_multa', 12, 0)->default(0);
            $table->decimal('cobrado_iva', 12, 0)->default(0);
            $table->char('pagado', 2)->default(0);
            $table->integer('atraso')->default(0);
            $table->unsignedBigInteger('prestamo_id');

            $table->foreign('prestamo_id')
            ->references('id')->on('prestamos')
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
        Schema::dropIfExists('prestamo_detalles');
    }
}
