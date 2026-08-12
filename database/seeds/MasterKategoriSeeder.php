<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_kategori

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterKategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_kategori')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_kategori` VALUES (1, NULL, 'Produk Konsumen', 'produk-konsumen', NULL, 1, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (2, NULL, 'Food Service', 'food-service', NULL, 2, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (3, NULL, 'Mesin-Mesin & Peralatan Khusus', 'mesin-peralatan-khusus', NULL, 3, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (4, 1, 'Supresso', 'consumer-supresso', NULL, 1, 'active', '2026-03-17 15:07:41', '2026-03-17 16:18:22');

INSERT INTO `master_kategori` VALUES (5, 1, 'BaliCafé', 'consumer-balicafe', NULL, 2, 'active', '2026-03-17 15:07:41', '2026-03-17 16:18:22');

INSERT INTO `master_kategori` VALUES (6, 1, 'UCAFÉ', 'consumer-ucafe', NULL, 3, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (7, 1, 'Rasa Sayang', 'consumer-rasa-sayang', NULL, 4, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (8, 1, 'Tugu Buaya', 'consumer-tugu-buaya', NULL, 5, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (9, 1, 'Uang Emas', 'consumer-uang-emas', NULL, 6, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (10, 1, 'BROCHOCO', 'consumer-brochoco', NULL, 7, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (11, 1, 'Jaheku', 'consumer-jaheku', NULL, 8, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (12, 1, 'intiRasa', 'consumer-intirasa', NULL, 9, 'active', '2026-03-17 15:07:41', '2026-04-10 14:07:41');

INSERT INTO `master_kategori` VALUES (13, 1, 'HaoCafe', 'consumer-hao-cafe', NULL, 10, 'active', '2026-03-17 15:07:41', '2026-04-10 14:07:56');

INSERT INTO `master_kategori` VALUES (14, 2, 'Kopi', 'service-kopi', NULL, 1, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (15, 2, 'Krimer', 'service-krimer', NULL, 2, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (16, 2, 'Teh', 'service-teh', NULL, 3, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (17, 2, 'Jahe', 'service-jahe', NULL, 4, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (18, 2, 'Cokelat', 'service-cokelat', NULL, 5, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (19, 2, 'Gula', 'service-gula', NULL, 6, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (20, 3, 'Mesin Kopi', 'mesin-kopi', NULL, 1, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (21, 3, 'Dispenser Minuman', 'dispenser-minuman', NULL, 2, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (22, 3, 'Aksesoris', 'aksesoris', NULL, 3, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (23, 3, 'Garansi', 'garansi', NULL, 4, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (24, 20, 'Full Otomatis', 'mesin-kopi-full-otomatis', NULL, 1, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (25, 20, 'Semi Otomatis', 'mesin-kopi-semi-otomatis', NULL, 2, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (26, 20, 'Sistem Seduh Kopi', 'sistem-seduh-kopi', NULL, 3, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (27, 20, 'Mesin Kopi Kapsul', 'mesin-kopi-kapsul', NULL, 4, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (28, 20, 'Grinder', 'mesin-kopi-grinder', NULL, 5, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (29, 20, 'Mesin Kopi Otomatis', 'mesin-kopi-otomatis', NULL, 6, 'active', '2026-03-17 15:07:41', '2026-03-17 15:28:04');

INSERT INTO `master_kategori` VALUES (30, 1, 'Kopi Ceria', 'consumer-kopi-ceria', NULL, 11, 'active', '2026-07-02 11:55:52', '2026-07-02 11:56:08');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
