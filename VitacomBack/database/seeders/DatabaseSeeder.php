<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'demo-admin@vitacon.demo'],
            [
                'name' => 'Admin Demo VitaCon',
                'password' => Hash::make('VitaDemo2026!'),
                'status' => 'ativo',
                'role' => 'admin',
            ]
        );
    }
}
