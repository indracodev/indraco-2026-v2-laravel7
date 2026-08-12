<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_banners

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterBannerSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_banners')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_banners` VALUES (1, 'images/coffee-bean.png', 'COFFEE Me', 'COFFEE Me', 'Enjoy a selection of quality coffee with a distinctive aroma.', 'Enjoy a selection of quality coffee with a distinctive aroma.', '/products', 'Explore Coffee', 'Explore Coffee', 1, 1, NULL, '2026-07-30 06:57:40', '2026-07-30 07:02:24');

INSERT INTO `master_banners` VALUES (2, 'images/ginger.png', 'GINGER', 'GINGER', 'Experience the warm, comforting, and soothing properties of our selected ginger.', 'Experience the warm, comforting, and soothing properties of our selected ginger.', '/products', 'Explore Ginger', 'Explore Ginger', 2, 1, NULL, '2026-07-30 06:57:40', '2026-07-30 06:57:40');

INSERT INTO `master_banners` VALUES (3, 'images/chocolate.png', 'CHOCOLATE', 'CHOCOLATE', 'Indulge in the rich, deep, and smooth flavors of premium quality chocolate drink.', 'Indulge in the rich, deep, and smooth flavors of premium quality chocolate drink.', '/products', 'Explore Chocolate', 'Explore Chocolate', 3, 1, NULL, '2026-07-30 06:57:40', '2026-07-30 06:57:40');

INSERT INTO `master_banners` VALUES (4, 'images/coconut.png', 'COCONUT', 'COCONUT', 'Delight in the fresh, creamy, and tropical taste of our premium coconut milk.', 'Delight in the fresh, creamy, and tropical taste of our premium coconut milk.', '/products', 'Explore Coconut', 'Explore Coconut', 4, 1, NULL, '2026-07-30 06:57:40', '2026-07-30 06:57:40');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
