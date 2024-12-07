<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipos')->insert([
            [
                'id' => 1,
                'nombre_equipo' => 'Capitanazo',
                'escudos' => 'capitanazo.jpg',
                'patrocinador_equipo' => 'Capitanazo',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre_equipo' => 'Cartman',
                'escudos' => 'cartman.jpg',
                'patrocinador_equipo' => 'Cartman',
                'monto_patrocinador' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nombre_equipo' => 'Bob',
                'escudos' => 'bob.jpeg',
                'patrocinador_equipo' => 'Bob',
                'monto_patrocinador' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nombre_equipo' => 'Calamardo',
                'escudos' => 'calamardo.jpg',
                'patrocinador_equipo' => 'Calamardo',
                'monto_patrocinador' => 7000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nombre_equipo' => 'Patricio',
                'escudos' => 'patricio.jpg',
                'patrocinador_equipo' => 'Patricio',
                'monto_patrocinador' => 9000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nombre_equipo' => 'Plancton',
                'escudos' => 'plancton.jpg',
                'patrocinador_equipo' => 'Plancton',
                'monto_patrocinador' => 6000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nombre_equipo' => 'Alejandra',
                'escudos' => 'alejandra.jpg',
                'patrocinador_equipo' => 'Alejandra',
                'monto_patrocinador' => 11000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nombre_equipo' => 'Homero',
                'escudos' => 'homero.jpeg',
                'patrocinador_equipo' => 'Homero',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 9,
                'nombre_equipo' => 'Karolg',
                'escudos' => 'karolg.jpg',
                'patrocinador_equipo' => 'Karolg',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'nombre_equipo' => 'Katy',
                'escudos' => 'katy.jpg',
                'patrocinador_equipo' => 'Katy',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 11,
                'nombre_equipo' => 'Lingling',
                'escudos' => 'lingling.jpg',
                'patrocinador_equipo' => 'Lingling',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'nombre_equipo' => 'Morocha',
                'escudos' => 'morocha.jpg',
                'patrocinador_equipo' => 'Morocha',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'nombre_equipo' => 'Mueble',
                'escudos' => 'mueble.jpeg',
                'patrocinador_equipo' => 'Mueble',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'nombre_equipo' => 'Aimep3',
                'escudos' => 'aimep3.jpg',
                'patrocinador_equipo' => 'Aimep3',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'nombre_equipo' => 'Beyonce',
                'escudos' => 'beyonce.jpg',
                'patrocinador_equipo' => 'Beyonce',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'nombre_equipo' => 'Erica',
                'escudos' => 'erica.png',
                'patrocinador_equipo' => 'Erica',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
