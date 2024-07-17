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
        Schema::create('operativo_policials', function (Blueprint $table) {
            $table->id('IdOperativo');
            $table->time('HoraOperativo');
            $table->date('FechaOperativo');
            $table->string('Descripcion',150);
            $table->unsignedBigInteger('NroRegistro');
            $table->foreign('NroRegistro')->references('NroRegistro')->on('registro_denuncias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operativo_policials');
    }
};
