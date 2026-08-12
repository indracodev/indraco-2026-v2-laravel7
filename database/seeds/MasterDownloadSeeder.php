<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_downloads

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterDownloadSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_downloads')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_downloads` VALUES (1, 'Supresso Product Catalog', 'Supresso Product Catalog & Origin Guide', 'Catalog & Brochure', 'Katalog produk lengkap Supresso Single Origin Coffee & Beans.', 'images/brochure-supresso.png', NULL, '4.2 MB', 1, 1, '2026-07-31 08:34:00', '2026-07-31 08:34:00');

INSERT INTO `master_downloads` VALUES (2, 'Ucafe Product Catalog', 'Ucafe Beverage & Blend Catalog', 'Catalog & Brochure', 'Katalog lengkap varian UCAFÉ instant coffee & milk blend.', 'images/brochure-ucafe.png', NULL, '3.5 MB', 2, 1, '2026-07-31 08:34:00', '2026-07-31 08:34:00');

INSERT INTO `master_downloads` VALUES (3, 'Brochoco Product Catalog', 'Brochoco Chocolate Beverage Catalog', 'Catalog & Brochure', 'Katalog varian minuman cokelat premium BROCHOCO.', 'images/brochure-brochoco.png', NULL, '2.8 MB', 3, 1, '2026-07-31 08:34:00', '2026-07-31 08:34:00');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
