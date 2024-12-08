<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_equipo');
            $table->string('escudos');
            $table->string('patrocinador_equipo')->default('Sin patrocinador');
            $table->integer('monto_patrocinador')->default(0);


        // $table->integer('partidos_jugados')->default(0);
        // $table->integer('victorias')->default(0);
        // $table->integer('empates')->default(0);
        // $table->integer('derrotas')->default(0);
        // $table->integer('goles_favor')->default(0);
        // $table->integer('goles_contra')->default(0);
        // $table->integer('diferencia_goles')->default(0);//goles_favor - goles_contra
        // $table->integer('puntos')->default(0);//victorias * 3 + empates

            $table->unsignedBigInteger('id_deporte')->nullable();
            $table->foreign('id_deporte')->references('id')->on('deportes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
