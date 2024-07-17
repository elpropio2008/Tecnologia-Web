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
        Schema::create('declaracione', function (Blueprint $table) {
            $table->id();
            $table->text('Declaracion',1000);
            $table->unsignedBigInteger('IdPersona');
            $table->unsignedBigInteger('NroRegistro');
            $table->unsignedBigInteger('IdTipo');

            $table->foreign('IdPersona')->references('IdPersona')->on('personas')->onDelete('cascade');
            $table->foreign('NroRegistro')->references('NroRegistro')->on('registro_denuncias')->onDelete('cascade');

            $table->foreign('IdTipo')->references('IdTipo')->on('tipo_personas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaracione');
    }
};
