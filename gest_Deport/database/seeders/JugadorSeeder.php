<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jugador;

class JugadorSeeder extends Seeder
{
    public function run()
    {
        // Datos base para los jugadores
        $jugadores = [
            ['nombre' => 'Jugador 1', 'edad' => 22],
            ['nombre' => 'Jugador 2', 'edad' => 24],
            ['nombre' => 'Jugador 3', 'edad' => 27],
            ['nombre' => 'Jugador 4', 'edad' => 21],
            ['nombre' => 'Jugador 5', 'edad' => 25],
            ['nombre' => 'Jugador 6', 'edad' => 26],
            ['nombre' => 'Jugador 7', 'edad' => 23],
            ['nombre' => 'Jugador 8', 'edad' => 22],
            ['nombre' => 'Jugador 9', 'edad' => 29],
            ['nombre' => 'Jugador 10', 'edad' => 24],
            ['nombre' => 'Jugador 11', 'edad' => 28],
            ['nombre' => 'Jugador 12', 'edad' => 30],
            ['nombre' => 'Jugador 13', 'edad' => 19],
            ['nombre' => 'Jugador 14', 'edad' => 20],
            ['nombre' => 'Jugador 15', 'edad' => 21],
            ['nombre' => 'Jugador 16', 'edad' => 25],
            ['nombre' => 'Jugador 17', 'edad' => 23],
            ['nombre' => 'Jugador 18', 'edad' => 28],
            ['nombre' => 'Jugador 19', 'edad' => 27],
            ['nombre' => 'Jugador 20', 'edad' => 24],
            ['nombre' => 'Jugador 21', 'edad' => 22],
            ['nombre' => 'Jugador 22', 'edad' => 23],
        ];

        // Agregar jugadores con datos adicionales
        foreach ($jugadores as $index => $jugador) {
            Jugador::create([
                'nombre' => $jugador['nombre'],
                'edad' => $jugador['edad'],
                'id_equipo' => 2, // Asociar al equipo con ID 2
            ]);
        }
    }
}


//php artisan make:seeder JugadorSeeder lo crea
//php artisan db:seed --class=JugadorSeeder lo ejecuta
