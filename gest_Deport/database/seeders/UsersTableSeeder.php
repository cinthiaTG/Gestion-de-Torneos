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
                'name' => 'Dani_Entrenadora',
                'email' => 'zamudio@gmail.com',
                'password' => Hash::make('dani123'),
                'rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Dani_Aficionada',
                'email' => 'zamudio1@gmail.com',
                'password' => Hash::make('dani123'),
                'rol_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Dani_Administradora',
                'email' => 'zamudio2@gmail.com',
                'password' => Hash::make('dani123'),
                'rol_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
