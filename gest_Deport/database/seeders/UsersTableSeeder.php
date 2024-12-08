<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Cinthia Vanessa Torres Grimmaldo',
                'email' => 'cintorrgril67@gmail.com',
                'password' => Hash::make('cinthia123'),
                'rol_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Elias Hernandez Rodriguez',
                'email' => 'elias123@gmail.com',
                'password' => Hash::make('elias123'),
                'rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'entrenador',
                'email' => 'entrenador@gmail.com',
                'password' => Hash::make('entrenador'),
                'rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'aficionado',
                'email' => 'aficionado@gmail.com',
                'password' => Hash::make('aficionado'),
                'rol_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'administrador',
                'email' => 'administrador@gmail.com',
                'password' => Hash::make('administrador'),
                'rol_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'jugador',
                'email' => 'jugador@gmail.com',
                'password' => Hash::make('jugador'),
                'rol_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'arbitro',
                'email' => 'arbitro@gmail.com',
                'password' => Hash::make('arbitro'),
                'rol_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
