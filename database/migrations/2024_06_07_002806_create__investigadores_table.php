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
        Schema::create('investigadores', function (Blueprint $table) {
            $table->id();
            $table->string('Profesion',100);
            $table->unsignedBigInteger('IdOperativo');
            $table->unsignedBigInteger('IdOficial');

            $table->foreign('IdOperativo')->references('IdOperativo')->on('operativo_policials')->onDelete('cascade');
            $table->foreign('IdOficial')->references('IdOficial')->on('oficiales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigadores');
    }
};
