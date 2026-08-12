<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_log_kunjungan

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterLogKunjunganSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_log_kunjungan')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_log_kunjungan` VALUES (1, 'Business Units', '/businesses', 'GET', '182.253.11.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (2, 'Home Landing Page', '/', 'GET', '103.21.244.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (3, 'Contact Us', '/contact', 'GET', '139.195.12.4', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (4, 'Careers & Jobs', '/careers', 'GET', '103.21.244.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (5, 'Business Units', '/businesses', 'GET', '139.195.12.4', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (6, 'Home Landing Page', '/', 'GET', '36.85.12.102', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (7, 'Online Store', '/store', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (8, 'Home Landing Page', '/', 'GET', '103.21.244.2', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (9, 'Product Catalog & Brands', '/products', 'GET', '182.253.11.89', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (10, 'Careers & Jobs', '/careers', 'GET', '103.21.244.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (11, 'Contact Us', '/contact', 'GET', '103.21.244.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (12, 'Product Catalog & Brands', '/products?brand=supresso', 'GET', '180.252.164.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (13, 'Product Catalog & Brands', '/products?brand=balicafe', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (14, 'Product Catalog & Brands', '/products?brand=balicafe', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (15, 'News & Articles', '/news', 'GET', '114.124.201.55', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (16, 'Downloads Center', '/downloads', 'GET', '139.195.12.4', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (17, 'Contact Us', '/contact', 'GET', '139.195.12.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (18, 'Contact Us', '/contact', 'GET', '139.195.12.4', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (19, 'Careers & Jobs', '/careers', 'GET', '182.253.11.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (20, 'About Us', '/about', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (21, 'Online Store', '/store', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (22, 'Product Catalog & Brands', '/products', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (23, 'Careers & Jobs', '/careers', 'GET', '114.124.201.55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (24, 'Downloads Center', '/downloads', 'GET', '180.252.164.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (25, 'News & Articles', '/news', 'GET', '114.124.201.55', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (26, 'Home Landing Page', '/', 'GET', '103.21.244.2', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (27, 'News & Articles', '/news', 'GET', '182.253.11.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (28, 'Product Catalog & Brands', '/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (29, 'Product Catalog & Brands', '/products?brand=balicafe', 'GET', '180.252.164.21', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (30, 'Business Units', '/businesses', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (31, 'Downloads Center', '/downloads', 'GET', '114.124.201.55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (32, 'Product Catalog & Brands', '/products?brand=balicafe', 'GET', '103.21.244.2', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (33, 'News & Articles', '/news', 'GET', '103.21.244.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (34, 'About Us', '/about', 'GET', '103.21.244.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (35, 'Downloads Center', '/downloads', 'GET', '182.253.11.89', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (36, 'Downloads Center', '/downloads', 'GET', '180.252.164.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (37, 'Product Catalog & Brands', '/products?brand=supresso', 'GET', '139.195.12.4', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (38, 'Careers & Jobs', '/careers', 'GET', '139.195.12.4', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (39, 'Careers & Jobs', '/careers', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (40, 'Home Landing Page', '/', 'GET', '114.124.201.55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (41, 'Downloads Center', '/downloads', 'GET', '103.21.244.2', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (42, 'Business Units', '/businesses', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (43, 'Home Landing Page', '/', 'GET', '36.85.12.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (44, 'Online Store', '/store', 'GET', '114.124.201.55', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (45, 'Product Catalog & Brands', '/products', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (46, 'Online Store', '/store', 'GET', '139.195.12.4', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (47, 'Home Landing Page', '/', 'GET', '114.124.201.55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (48, 'Product Catalog & Brands', '/products?brand=supresso', 'GET', '103.21.244.2', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (49, 'Online Store', '/store', 'GET', '182.253.11.89', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (50, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (51, 'Careers & Jobs', '/careers', 'GET', '182.253.11.89', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (52, 'Product Catalog & Brands', '/products?brand=balicafe', 'GET', '103.21.244.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (53, 'Business Units', '/businesses', 'GET', '103.21.244.2', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (54, 'Home Landing Page', '/', 'GET', '182.253.11.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (55, 'Downloads Center', '/downloads', 'GET', '139.195.12.4', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (56, 'News & Articles', '/news', 'GET', '36.85.12.102', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (57, 'About Us', '/about', 'GET', '114.124.201.55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (58, 'Contact Us', '/contact', 'GET', '180.252.164.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (59, 'About Us', '/about', 'GET', '180.252.164.21', 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36', 'Tablet', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (60, 'Product Catalog & Brands', '/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 06:55:53', '2026-07-31 06:55:53');

INSERT INTO `master_log_kunjungan` VALUES (61, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:22:36', '2026-07-31 07:22:36');

INSERT INTO `master_log_kunjungan` VALUES (62, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:22:39', '2026-07-31 07:22:39');

INSERT INTO `master_log_kunjungan` VALUES (63, 'About Us', '/about', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:28:04', '2026-07-31 07:28:04');

INSERT INTO `master_log_kunjungan` VALUES (64, 'Product Catalog & Brands', '/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:28:08', '2026-07-31 07:28:08');

INSERT INTO `master_log_kunjungan` VALUES (65, 'Business Units', '/businesses', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:28:13', '2026-07-31 07:28:13');

INSERT INTO `master_log_kunjungan` VALUES (66, 'Business Units', '/businesses', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:30:23', '2026-07-31 07:30:23');

INSERT INTO `master_log_kunjungan` VALUES (67, 'Online Store', '/store', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:30:51', '2026-07-31 07:30:51');

INSERT INTO `master_log_kunjungan` VALUES (68, 'News & Articles', '/news', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:31:30', '2026-07-31 07:31:30');

INSERT INTO `master_log_kunjungan` VALUES (69, 'Careers & Jobs', '/careers', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:31:46', '2026-07-31 07:31:46');

INSERT INTO `master_log_kunjungan` VALUES (70, 'Careers & Jobs', '/careers', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:33:28', '2026-07-31 07:33:28');

INSERT INTO `master_log_kunjungan` VALUES (71, 'Contact Us', '/contact', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:33:36', '2026-07-31 07:33:36');

INSERT INTO `master_log_kunjungan` VALUES (72, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:35:32', '2026-07-31 07:35:32');

INSERT INTO `master_log_kunjungan` VALUES (73, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:37:34', '2026-07-31 07:37:34');

INSERT INTO `master_log_kunjungan` VALUES (74, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:40:09', '2026-07-31 07:40:09');

INSERT INTO `master_log_kunjungan` VALUES (75, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:40:58', '2026-07-31 07:40:58');

INSERT INTO `master_log_kunjungan` VALUES (76, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:41:00', '2026-07-31 07:41:00');

INSERT INTO `master_log_kunjungan` VALUES (77, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:41:03', '2026-07-31 07:41:03');

INSERT INTO `master_log_kunjungan` VALUES (78, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:41:17', '2026-07-31 07:41:17');

INSERT INTO `master_log_kunjungan` VALUES (79, 'Product Catalog & Brands', '/products?search=tugu+buaya', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 07:59:19', '2026-07-31 07:59:19');

INSERT INTO `master_log_kunjungan` VALUES (80, 'Product Catalog & Brands', '/products?search=tugu+buaya', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:02:55', '2026-07-31 08:02:55');

INSERT INTO `master_log_kunjungan` VALUES (81, 'Product Catalog & Brands', '/products?search=tugu+buaya', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:21:12', '2026-07-31 08:21:12');

INSERT INTO `master_log_kunjungan` VALUES (82, 'Product Catalog & Brands', '/products?search=tugu+buayajaheku', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:21:35', '2026-07-31 08:21:35');

INSERT INTO `master_log_kunjungan` VALUES (83, 'Product Catalog & Brands', '/products?search=jaheku', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:21:41', '2026-07-31 08:21:41');

INSERT INTO `master_log_kunjungan` VALUES (84, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:22:18', '2026-07-31 08:22:18');

INSERT INTO `master_log_kunjungan` VALUES (85, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:22:20', '2026-07-31 08:22:20');

INSERT INTO `master_log_kunjungan` VALUES (86, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:25:03', '2026-07-31 08:25:03');

INSERT INTO `master_log_kunjungan` VALUES (87, 'Product Catalog & Brands', '/products?brand=intirasa', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:26:17', '2026-07-31 08:26:17');

INSERT INTO `master_log_kunjungan` VALUES (88, 'Product Catalog & Brands', '/products?brand=supresso', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:26:22', '2026-07-31 08:26:22');

INSERT INTO `master_log_kunjungan` VALUES (89, 'Product Catalog & Brands', '/products?brand=balicafe', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 08:26:30', '2026-07-31 08:26:30');

INSERT INTO `master_log_kunjungan` VALUES (90, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:27:40', '2026-07-31 08:27:40');

INSERT INTO `master_log_kunjungan` VALUES (91, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:27:44', '2026-07-31 08:27:44');

INSERT INTO `master_log_kunjungan` VALUES (92, 'Product Catalog & Brands', '/products?brand=brochoco', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:28:03', '2026-07-31 08:28:03');

INSERT INTO `master_log_kunjungan` VALUES (93, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:28:29', '2026-07-31 08:28:29');

INSERT INTO `master_log_kunjungan` VALUES (94, 'About Us', '/about', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:28:33', '2026-07-31 08:28:33');

INSERT INTO `master_log_kunjungan` VALUES (95, 'Product Catalog & Brands', '/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:28:51', '2026-07-31 08:28:51');

INSERT INTO `master_log_kunjungan` VALUES (96, 'Business Units', '/businesses', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:29:30', '2026-07-31 08:29:30');

INSERT INTO `master_log_kunjungan` VALUES (97, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:31:48', '2026-07-31 08:31:48');

INSERT INTO `master_log_kunjungan` VALUES (98, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:35:49', '2026-07-31 08:35:49');

INSERT INTO `master_log_kunjungan` VALUES (99, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 08:37:00', '2026-07-31 08:37:00');

INSERT INTO `master_log_kunjungan` VALUES (100, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 09:23:48', '2026-07-31 09:23:48');

INSERT INTO `master_log_kunjungan` VALUES (101, 'Downloads Center', '/downloads', 'GET', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', '2026-07-31 09:25:54', '2026-07-31 09:25:54');

INSERT INTO `master_log_kunjungan` VALUES (102, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:33:43', '2026-07-31 09:33:43');

INSERT INTO `master_log_kunjungan` VALUES (103, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:33:45', '2026-07-31 09:33:45');

INSERT INTO `master_log_kunjungan` VALUES (104, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:34:39', '2026-07-31 09:34:39');

INSERT INTO `master_log_kunjungan` VALUES (105, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:34:41', '2026-07-31 09:34:41');

INSERT INTO `master_log_kunjungan` VALUES (106, 'Business Units', '/businesses', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:36:09', '2026-07-31 09:36:09');

INSERT INTO `master_log_kunjungan` VALUES (107, 'Online Store', '/store', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:36:19', '2026-07-31 09:36:19');

INSERT INTO `master_log_kunjungan` VALUES (108, 'Careers & Jobs', '/careers', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:36:31', '2026-07-31 09:36:31');

INSERT INTO `master_log_kunjungan` VALUES (109, 'Careers & Jobs', '/careers', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:38:52', '2026-07-31 09:38:52');

INSERT INTO `master_log_kunjungan` VALUES (110, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:49:54', '2026-07-31 09:49:54');

INSERT INTO `master_log_kunjungan` VALUES (111, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:50:57', '2026-07-31 09:50:57');

INSERT INTO `master_log_kunjungan` VALUES (112, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:51:15', '2026-07-31 09:51:15');

INSERT INTO `master_log_kunjungan` VALUES (113, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:51:20', '2026-07-31 09:51:20');

INSERT INTO `master_log_kunjungan` VALUES (114, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:51:25', '2026-07-31 09:51:25');

INSERT INTO `master_log_kunjungan` VALUES (115, 'Halaman /privacy-policy', '/privacy-policy', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:51:30', '2026-07-31 09:51:30');

INSERT INTO `master_log_kunjungan` VALUES (116, 'Halaman /terms-and-conditions', '/terms-and-conditions', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:51:41', '2026-07-31 09:51:41');

INSERT INTO `master_log_kunjungan` VALUES (117, 'Halaman /data-protection', '/data-protection', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:51:48', '2026-07-31 09:51:48');

INSERT INTO `master_log_kunjungan` VALUES (118, 'Halaman /help', '/help', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:51:58', '2026-07-31 09:51:58');

INSERT INTO `master_log_kunjungan` VALUES (119, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:52:17', '2026-07-31 09:52:17');

INSERT INTO `master_log_kunjungan` VALUES (120, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:52:21', '2026-07-31 09:52:21');

INSERT INTO `master_log_kunjungan` VALUES (121, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:55:03', '2026-07-31 09:55:03');

INSERT INTO `master_log_kunjungan` VALUES (122, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-07-31 09:55:14', '2026-07-31 09:55:14');

INSERT INTO `master_log_kunjungan` VALUES (123, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 02:34:04', '2026-08-04 02:34:04');

INSERT INTO `master_log_kunjungan` VALUES (124, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 03:44:16', '2026-08-04 03:44:16');

INSERT INTO `master_log_kunjungan` VALUES (125, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 03:48:42', '2026-08-04 03:48:42');

INSERT INTO `master_log_kunjungan` VALUES (126, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 03:48:53', '2026-08-04 03:48:53');

INSERT INTO `master_log_kunjungan` VALUES (127, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 03:49:21', '2026-08-04 03:49:21');

INSERT INTO `master_log_kunjungan` VALUES (128, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 03:49:33', '2026-08-04 03:49:33');

INSERT INTO `master_log_kunjungan` VALUES (129, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 03:52:45', '2026-08-04 03:52:45');

INSERT INTO `master_log_kunjungan` VALUES (130, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:36:31', '2026-08-04 04:36:31');

INSERT INTO `master_log_kunjungan` VALUES (131, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:36:46', '2026-08-04 04:36:46');

INSERT INTO `master_log_kunjungan` VALUES (132, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:37:31', '2026-08-04 04:37:31');

INSERT INTO `master_log_kunjungan` VALUES (133, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:37:40', '2026-08-04 04:37:40');

INSERT INTO `master_log_kunjungan` VALUES (134, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:44:59', '2026-08-04 04:44:59');

INSERT INTO `master_log_kunjungan` VALUES (135, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:45:03', '2026-08-04 04:45:03');

INSERT INTO `master_log_kunjungan` VALUES (136, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:45:15', '2026-08-04 04:45:15');

INSERT INTO `master_log_kunjungan` VALUES (137, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:48:13', '2026-08-04 04:48:13');

INSERT INTO `master_log_kunjungan` VALUES (138, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:48:20', '2026-08-04 04:48:20');

INSERT INTO `master_log_kunjungan` VALUES (139, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:50:34', '2026-08-04 04:50:34');

INSERT INTO `master_log_kunjungan` VALUES (140, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:55:32', '2026-08-04 04:55:32');

INSERT INTO `master_log_kunjungan` VALUES (141, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 04:55:48', '2026-08-04 04:55:48');

INSERT INTO `master_log_kunjungan` VALUES (142, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:03:01', '2026-08-04 06:03:01');

INSERT INTO `master_log_kunjungan` VALUES (143, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:03:16', '2026-08-04 06:03:16');

INSERT INTO `master_log_kunjungan` VALUES (144, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:17:17', '2026-08-04 06:17:17');

INSERT INTO `master_log_kunjungan` VALUES (145, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:17:48', '2026-08-04 06:17:48');

INSERT INTO `master_log_kunjungan` VALUES (146, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:17:52', '2026-08-04 06:17:52');

INSERT INTO `master_log_kunjungan` VALUES (147, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:30:02', '2026-08-04 06:30:02');

INSERT INTO `master_log_kunjungan` VALUES (148, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:30:23', '2026-08-04 06:30:23');

INSERT INTO `master_log_kunjungan` VALUES (149, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:34:47', '2026-08-04 06:34:47');

INSERT INTO `master_log_kunjungan` VALUES (150, 'Halaman /csr', '/csr', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 06:39:16', '2026-08-04 06:39:16');

INSERT INTO `master_log_kunjungan` VALUES (151, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 08:20:33', '2026-08-04 08:20:33');

INSERT INTO `master_log_kunjungan` VALUES (152, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 08:20:37', '2026-08-04 08:20:37');

INSERT INTO `master_log_kunjungan` VALUES (153, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 08:21:03', '2026-08-04 08:21:03');

INSERT INTO `master_log_kunjungan` VALUES (154, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 08:21:08', '2026-08-04 08:21:08');

INSERT INTO `master_log_kunjungan` VALUES (155, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 08:21:31', '2026-08-04 08:21:31');

INSERT INTO `master_log_kunjungan` VALUES (156, 'Home Landing Page', '/', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', '2026-08-04 08:21:37', '2026-08-04 08:21:37');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
