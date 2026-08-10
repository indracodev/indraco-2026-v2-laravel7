<?php

// Seeder for Laravel 7

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@indraco.com'],
            [
                'name' => 'Administrator Indraco',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
