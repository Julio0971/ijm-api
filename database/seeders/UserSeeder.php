<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {
        User::create([
            'name' => 'Administrador',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'step' => null
        ]);
        
        User::create([
            'name' => 'Participante',
            'username' => 'participante',
            'password' => Hash::make('password'),
            'role' => 'participant',
            'step' => 'home'
        ]);
    }
}