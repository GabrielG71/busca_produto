<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nome' => 'Gabriel',
            'email' => 'gabrielgoncalves2981@gmail.com',
            'password' => Hash::make('123'),
            'admin' => 1
        ]);
    }
}