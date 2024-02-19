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
        Schema::create('entrenador', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre');
            $table->date('fechaN');
            $table->string('ciudad');
            $table->string('idEntrenador');
            $table->string('nick')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrenador');
    }
};
