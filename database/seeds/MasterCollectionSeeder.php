<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_collection

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCollectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_collection')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_collection` VALUES (1, 8, 'single origin', 'single-origin', 'active', '2026-03-17 15:08:40');

INSERT INTO `master_collection` VALUES (2, 8, 'gourmet', 'gourmet', 'active', '2026-03-17 15:08:51');

INSERT INTO `master_collection` VALUES (3, 8, 'world blend', 'world-blend', 'active', '2026-03-17 15:09:10');

INSERT INTO `master_collection` VALUES (4, 8, 'the collection', 'the-collection', 'active', '2026-03-17 15:09:21');

INSERT INTO `master_collection` VALUES (5, 8, 'Kraton', 'kraton', 'active', '2026-03-17 15:09:40');

INSERT INTO `master_collection` VALUES (6, 8, 'accessories', 'accessories', 'inactive', '2026-03-17 15:10:36');

INSERT INTO `master_collection` VALUES (7, 9, 'Bali Cafe', 'bali-cafe', 'active', '2026-03-25 10:10:15');

INSERT INTO `master_collection` VALUES (8, 9, 'Coffee Collection', 'coffee-collection', 'active', '2026-03-25 10:10:15');

INSERT INTO `master_collection` VALUES (9, 9, 'Luwak Collection', 'luwak-collection', 'active', '2026-03-25 10:10:15');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
