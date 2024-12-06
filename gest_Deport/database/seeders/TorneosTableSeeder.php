<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('torneos')->insert([
            [
                'nombre_torneo' => 'Copa de Verano',
                'numero_equipos' => 8,
                'patrocinador_torneo' => 'Pepsi',
                'monto_patrocinador' => 5000,
                'finalizado' => false,
                'id_ganador' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_torneo' => 'Liga Iniciativa',
                'numero_equipos' => 16,
                'patrocinador_torneo' => 'Coca-Cola',
                'monto_patrocinador' => 10000,
                'finalizado' => true,
                'id_ganador' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_torneo' => 'Mini Torneo Local',
                'numero_equipos' => 4,
                'patrocinador_torneo' => 'Local Gym',
                'monto_patrocinador' => 2000,
                'finalizado' => false,
                'id_ganador' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
