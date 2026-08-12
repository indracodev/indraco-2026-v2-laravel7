<?php

// Master DatabaseSeeder for Laravel 7

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            UserSeeder::class,
            MasterMerekSeeder::class,
            MasterKategoriSeeder::class,
            MasterCollectionSeeder::class,
            MasterTypeSeeder::class,
            MasterVariantSeeder::class,
            MasterProdukSeeder::class,
            MasterBannerSeeder::class,
            MasterNewsSeeder::class,
            MasterDownloadSeeder::class,
            MasterSettingSeeder::class,
            MasterLogAktivitasSeeder::class,
            MasterLogKunjunganSeeder::class,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
