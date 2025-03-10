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
            'nome' => 'João',
            'email' => 'joao@gmail.com',
            'password' => Hash::make('1'),
            'admin' => 0
        ]);
    }
}