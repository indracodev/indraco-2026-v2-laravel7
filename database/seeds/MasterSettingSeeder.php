<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_settings

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_settings')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_settings` VALUES (1, 'theme_color', '#004b49', 'theme', '2026-08-04 03:41:22', '2026-08-04 06:44:38');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
