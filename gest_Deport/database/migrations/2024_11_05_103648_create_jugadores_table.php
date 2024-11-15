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
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('edad');
            $table->string('posicion');
            $table->unsignedBigInteger('id_equipo')->nullable();
            $table->foreign('id_equipo')->references('id')->on('equipos')->onDelete('cascade');
            $table->unsignedBigInteger('id_deporte')->nullable();
            $table->foreign('id_deporte')->references('id')->on('deportes')->onDelete('cascade');

            // Stats fields
            $table->integer('puntos');
            $table->integer('asistencias');
            $table->integer('tarjetas_amarillas');
            $table->integer('tarjetas_rojas');
            $table->integer('faltas');

            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
