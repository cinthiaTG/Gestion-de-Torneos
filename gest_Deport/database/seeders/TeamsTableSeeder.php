<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipos')->insert([
            [
                'id' => 1,
                'nombre_equipo' => 'Judias iconiks',
                'escudos' => 'judios.jpg',
                'patrocinador_equipo' => 'Eve Judia',
                'monto_patrocinador' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre_equipo' => 'Evangeliks lut-ty',
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
        ]);

    }
}
