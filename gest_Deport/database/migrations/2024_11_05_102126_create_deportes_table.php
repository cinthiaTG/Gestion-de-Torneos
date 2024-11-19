<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Asegúrate de agregar esta línea

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_deporte');
            $table->timestamps();
        });

        DB::table('deportes')->insert([
            ['id' => 1, 'nombre_deporte' => 'Futbol Americano'],
            ['id' => 2, 'nombre_deporte' => 'Futbol Soccer'],
            ['id' => 3, 'nombre_deporte' => 'Volleyball'],
            ['id' => 4, 'nombre_deporte' => 'Basketball'],
        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deportes');
    }
};
