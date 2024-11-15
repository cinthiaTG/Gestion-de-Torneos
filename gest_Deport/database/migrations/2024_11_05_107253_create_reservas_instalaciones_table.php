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
        Schema::create('reservas_instalaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_instalacion');
            $table->foreign('id_instalacion')->references('id')->on('instalaciones')->onDelete('cascade'); 
            $table->unsignedBigInteger('id_partido');
            $table->foreign('id_partido')->references('id')->on('partidos')->onDelete('cascade');    
            $table->date('fecha_reserva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas_instalaciones');
    }
};
