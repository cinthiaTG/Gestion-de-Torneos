<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instalaciones')->insert([
            [
                'nombre_instalacion' => 'Estadio Olímpico',
                'ubicacion' => 'Avenida Central #123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_instalacion' => 'Gimnasio Nacional',
                'ubicacion' => 'Calle Principal #45',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_instalacion' => 'Centro Acuático',
                'ubicacion' => 'Boulevard Deportivo #67',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
