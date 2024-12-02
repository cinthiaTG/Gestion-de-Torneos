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
                //Admin
                'id' => 1,
                'name' => 'Cinthia Vanessa Torres Grimmaldo',
                'email' => 'cintorrgril67@gmail.com',
                'password' => Hash::make('cinthia123'),
                'rol' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //Entrenador
                'id' => 2,
                'name' => 'Elias Hernandez Rodriguez',
                'email' => 'elias123@gmail.com',
                'password' => Hash::make('elias123'),
                'rol' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
