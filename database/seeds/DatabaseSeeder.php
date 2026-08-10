<?php

// Seeder for Laravel 7

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MasterMerekSeeder::class,
            MasterBannerSeeder::class,
            MasterNewsSeeder::class,
            MasterDownloadSeeder::class,
        ]);
    }
}
