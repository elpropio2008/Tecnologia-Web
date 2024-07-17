<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registro_denuncias', function (Blueprint $table) {
            $table->id('NroRegistro');
            $table->time('Hora');
            $table->date('Fecha');
            $table->text('Observaciones',1000);
            $table->unsignedBigInteger('id');

            $table->foreign('id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_denuncias');
    }
};
