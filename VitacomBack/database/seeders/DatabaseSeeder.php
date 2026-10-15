<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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

        if (!DB::table('oauth_personal_access_clients')->exists()) {
            Artisan::call('passport:client', [
                '--personal' => true,
                '--name' => 'VitaCon Demo Personal Access Client',
                '--no-interaction' => true,
            ]);
        }
    }
}
