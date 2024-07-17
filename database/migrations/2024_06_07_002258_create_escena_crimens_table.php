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
        Schema::create('escena_crimens', function (Blueprint $table) {
            $table->id('IdEscena');
            $table->string('Descripcion',150);

            $table->unsignedBigInteger('IdUbicacion');
            $table->foreign('IdUbicacion')->references('IdUbicacion')->on('ubicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escena_crimens');
    }
};
