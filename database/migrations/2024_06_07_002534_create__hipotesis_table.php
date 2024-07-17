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
        Schema::create('hipotesis', function (Blueprint $table) {
            $table->id();
            $table->string('Detalles',100);
            $table->unsignedBigInteger('NroRegistro');
            $table->unsignedBigInteger('IdEvidencia');

            $table->foreign('NroRegistro')->references('NroRegistro')->on('registro_denuncias')->onDelete('cascade');
            $table->foreign('IdEvidencia')->references('IdEvidencia')->on('evidencias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hipotesis');
    }
};
