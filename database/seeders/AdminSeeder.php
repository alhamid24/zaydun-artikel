<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@zaydun.com'],
            [
                'name' => 'Admin Zaydun',
                'password' => bcrypt('password'),
            ]
        );
    }
}
