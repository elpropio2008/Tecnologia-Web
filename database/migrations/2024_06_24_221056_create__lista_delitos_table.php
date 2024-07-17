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
        Schema::create('lista_delitos', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion');
            $table->unsignedBigInteger('IdDelitos');
            $table->unsignedBigInteger('NroRegistro');

            $table->foreign('IdDelitos')->references('IdDelito')->on('Delitos')->onDelete('cascade');
            $table->foreign('NroRegistro')->references('NroRegistro')->on('registro_denuncias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_delitos');
    }
};
