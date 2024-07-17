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
        Schema::create('oficiales', function (Blueprint $table) {
            $table->id('IdOficial');
            $table->integer('CI');
            $table->string('Nombres',100);
            $table->string('Apellidos',100);
            $table->date('FechaNacimiento');
            $table->string('Grado',100);
            $table->decimal('Sueldo',8,2,false);
            $table->string('Direccion');
            $table->integer('Telefono');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oficiales');
    }
};
