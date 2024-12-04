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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_torneo');
            $table->integer('numero_equipos');
            $table->string('patrocinador_torneo')->default('Sin patrocinador');
            $table->integer('monto_patrocinador')->default(0);
            $table->boolean('finalizado')->default(false); // Nuevo
            $table->unsignedBigInteger('id_ganador')->nullable(); // Nuevo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
