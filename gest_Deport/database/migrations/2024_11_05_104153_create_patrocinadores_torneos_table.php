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
        Schema::create('patrocinadores_torneos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patrocinador');
            $table->foreign('id_patrocinador')->references('id')->on('patrocinadores')->onDelete('cascade');
            $table->unsignedBigInteger('id_torneo');
            $table->foreign('id_torneo')->references('id')->on('torneos')->onDelete('cascade');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patrocinadores_torneos');
    }
};
