<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario con el rol de 'entrenador' (rol_id = 2)
        User::create([
            'name' => 'Juan Perez', // Nombre del usuario
            'email' => 'juan@ejemplo.com', // Correo electrónico
            'password' => Hash::make('contraseña123'), // Contraseña hasheada
            'rol_id' => 2, // Asignar el rol 'entrenador' con rol_id = 2
        ]);
    }
}
