<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_type

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_type')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_type` VALUES (1, 1, 'Coffee Beans', 'Coffee-Beans', '2026-03-17 16:01:40');

INSERT INTO `master_type` VALUES (2, 2, 'Ground Coffee', 'Ground-Coffee', '2026-03-17 16:01:57');

INSERT INTO `master_type` VALUES (3, NULL, 'Black Coffee', 'Black-Coffee', '2026-03-17 16:02:49');

INSERT INTO `master_type` VALUES (4, NULL, 'Chocolatier', 'Chocolatier', '2026-03-17 16:03:08');

INSERT INTO `master_type` VALUES (5, NULL, 'Gingeroot', 'Gingeroot', '2026-03-17 16:03:20');

INSERT INTO `master_type` VALUES (6, NULL, 'Luwak', 'Luwak', '2026-03-17 16:07:38');

INSERT INTO `master_type` VALUES (7, 4, 'Coffee Beans', 'Coffee-Beans', '2026-03-25 11:42:10');

INSERT INTO `master_type` VALUES (8, 4, 'Ground Coffee', 'Ground-Coffee', '2026-03-25 11:42:43');

INSERT INTO `master_type` VALUES (9, 5, 'Machine', 'machine', '2026-03-25 13:44:00');

INSERT INTO `master_type` VALUES (10, 6, 'Gift', 'gift', '2026-03-25 13:52:07');

INSERT INTO `master_type` VALUES (11, 3, 'Drip Coffee', 'drip-coffee', '2026-05-11 10:06:59');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
