<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('edad');
            $table->unsignedBigInteger('id_equipo')->nullable();

        // // Stats fields
        // $table->integer('puntos')->default(0);
        // $table->integer('asistencias')->default(0);
        // $table->integer('tarjetas_amarillas')->default(0);
        // $table->integer('tarjetas_rojas')->default(0);
        // $table->integer('faltas')->default(0);
        // $table->integer('minutos_jugados')->default(0);
        // $table->integer('partidos_jugados')->default(0);
        // $table->integer('goles_contra')->default(0);




            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
