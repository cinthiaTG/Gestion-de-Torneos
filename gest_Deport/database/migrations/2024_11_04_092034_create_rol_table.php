<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Asegúrate de agregar esta línea


// SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key
// constraint fails (g_deportivo.usuarios, CONSTRAINT usuarios_rol_id_foreign FOREIGN KEY (rol_id) REFERENCES roles (id)
//  ON DELETE CASCADE)  mismo error



return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_rol');
            $table->timestamps();
        });

        // aqui esta metiendo los roles por defecto la pregunta es xq me haces daño daniel, la respuesta es:
        // como estas haciendo referencia a la tabla roles y aun no tenia datos, como lo hacias primero la creas

        DB::table('roles')->insert([
            ['id' => 1, 'nombre_rol' => 'Aficionado'],
            ['id' => 2, 'nombre_rol' => 'Entrenador'],
            ['id' => 3, 'nombre_rol' => 'Jugador'],
            ['id' => 4, 'nombre_rol' => 'Árbitro'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
