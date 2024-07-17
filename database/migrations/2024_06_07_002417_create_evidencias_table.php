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
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id('IdEvidencia');
            $table->string('Descripcion',150);
            $table->unsignedBigInteger('declaracion_id');
            $table->unsignedBigInteger('IdEscena');
            
            $table->foreign('declaracion_id')->references('id')->on('declaracione')->onDelete('cascade');
            $table->foreign('IdEscena')->references('IdEscena')->on('escena_crimens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidencias');
    }
};
