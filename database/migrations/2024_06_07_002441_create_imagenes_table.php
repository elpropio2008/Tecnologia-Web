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
        Schema::create('Imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('Url');
            $table->unsignedBigInteger('ImagenTable_id');
            $table->string('ImagenTable_type');
            /*$table->unsignedBigInteger('IdPersona')->nullable();
            $table->unsignedBigInteger('IdOficial')->nullable();
            $table->unsignedBigInteger('IdEscena')->nullable();
            $table->unsignedBigInteger('IdEvidencia')->nullable();

            $table->foreign('IdPersona')->references('IdPersona')->on('personas')->onDelete('cascade');
            $table->foreign('IdOficial')->references('IdOficial')->on('oficiales')->onDelete('cascade');
            $table->foreign('IdEscena')->references('IdEscena')->on('escena_crimens')->onDelete('cascade');
            $table->foreign('IdEvidencia')->references('IdEvidencia')->on('evidencias')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
