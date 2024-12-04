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
                'nombre_equipo' => 'Judias Iconiks',
                'escudos' => 'judias.png',
                'patrocinador_equipo' => 'Eve Judia',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre_equipo' => 'Evangeliks Lut-ty',
                'escudos' => 'evangelik.jpg',
                'patrocinador_equipo' => 'Eve Evangelik',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nombre_equipo' => 'Catolik Gurls',
                'escudos' => 'catolika.jpg',
                'patrocinador_equipo' => 'Eve Catolik',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nombre_equipo' => 'Muslim Lions',
                'escudos' => 'muslim.png',
                'patrocinador_equipo' => 'Eve Muslim',
                'monto_patrocinador' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nombre_equipo' => 'Hindu Warriors',
                'escudos' => 'hindu.png',
                'patrocinador_equipo' => 'Eve Hindu',
                'monto_patrocinador' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nombre_equipo' => 'Buddhist Monks',
                'escudos' => 'buddhist.png',
                'patrocinador_equipo' => 'Eve Buddhist',
                'monto_patrocinador' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nombre_equipo' => 'Atheist Minds',
                'escudos' => 'atheist.png',
                'patrocinador_equipo' => 'Eve Atheist',
                'monto_patrocinador' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nombre_equipo' => 'Agnostic Dreamers',
                'escudos' => 'agnostic.png',
                'patrocinador_equipo' => 'Eve Agnostic',
                'monto_patrocinador' => 7000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'nombre_equipo' => 'Shinto Spirits',
                'escudos' => 'shinto.png',
                'patrocinador_equipo' => 'Eve Shinto',
                'monto_patrocinador' => 11000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'nombre_equipo' => 'Sikh Soldiers',
                'escudos' => 'sikh.png',
                'patrocinador_equipo' => 'Eve Sikh',
                'monto_patrocinador' => 13000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'nombre_equipo' => 'Rastafari Rebels',
                'escudos' => 'rastafari.png',
                'patrocinador_equipo' => 'Eve Rastafari',
                'monto_patrocinador' => 9000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'nombre_equipo' => 'Pagan Wolves',
                'escudos' => 'pagan.png',
                'patrocinador_equipo' => 'Eve Pagan',
                'monto_patrocinador' => 6000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'nombre_equipo' => 'Taoist Turtles',
                'escudos' => 'taoist.png',
                'patrocinador_equipo' => 'Eve Taoist',
                'monto_patrocinador' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'nombre_equipo' => 'Zoroastrian Eagles',
                'escudos' => 'zoroastrian.png',
                'patrocinador_equipo' => 'Eve Zoroastrian',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'nombre_equipo' => 'Animist Panthers',
                'escudos' => 'animist.png',
                'patrocinador_equipo' => 'Eve Animist',
                'monto_patrocinador' => 9500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'nombre_equipo' => 'Scientologist Jets',
                'escudos' => 'scientologist.png',
                'patrocinador_equipo' => 'Eve Scientologist',
                'monto_patrocinador' => 10500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
