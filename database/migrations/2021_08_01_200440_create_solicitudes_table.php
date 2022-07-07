<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_solicitado', 12, 0);
            $table->char('plazo', 2);
            $table->char('tasa', 2);
            $table->decimal('monto_cuota', 12, 0);
            $table->dateTime('fecha_presentacion');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('persona_id')->nullable();

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
        Schema::dropIfExists('solicitudes');
    }
}
