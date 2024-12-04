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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_torneo');
            $table->foreign('id_torneo')->references('id')->on('torneos')->onDelete('cascade');
            $table->unsignedBigInteger('id_equipo_local');
            $table->foreign('id_equipo_local')->references('id')->on('equipos')->onDelete('cascade');
            $table->unsignedBigInteger('id_equipo_visitante');
            $table->foreign('id_equipo_visitante')->references('id')->on('equipos')->onDelete('cascade');
            $table->unsignedBigInteger('id_instalacion');
            $table->foreign('id_instalacion')->references('id')->on('instalaciones')->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora');

            $table->boolean('finalizado')->default(false); // Nuevo
            $table->unsignedBigInteger('id_ganador')->nullable(); // Nuevo
            $table->foreign('id_ganador')->references('id')->on('equipos')->nullOnDelete(); // Nuevo
            $table->integer('ronda')->default(0); // Nuevo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
