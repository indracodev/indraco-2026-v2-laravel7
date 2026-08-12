<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_log_aktivitas

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterLogAktivitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_log_aktivitas')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_log_aktivitas` VALUES (1, 1, 'Login Admin', 'User', 1, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/login', '2026-07-30 02:51:18', '2026-07-30 02:51:18');

INSERT INTO `master_log_aktivitas` VALUES (2, 1, 'Logout Admin', 'User', 1, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', '2026-07-30 03:56:44', '2026-07-30 03:56:44');

INSERT INTO `master_log_aktivitas` VALUES (3, 1, 'Login Admin', 'User', 1, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/login', '2026-07-30 04:02:20', '2026-07-30 04:02:20');

INSERT INTO `master_log_aktivitas` VALUES (4, 1, 'Logout Admin', 'User', 1, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'http://127.0.0.1:8000/admin/logout', '2026-07-30 09:55:34', '2026-07-30 09:55:34');

INSERT INTO `master_log_aktivitas` VALUES (5, 1, 'Login Admin', 'User', 1, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/login', '2026-07-31 03:12:19', '2026-07-31 03:12:19');

INSERT INTO `master_log_aktivitas` VALUES (6, 1, 'Login Admin', 'User', 1, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/login', '2026-08-04 02:34:35', '2026-08-04 02:34:35');

INSERT INTO `master_log_aktivitas` VALUES (7, 1, 'Memperbarui Warna Theme Website ke #ee5d1d', 'MasterSetting', NULL, NULL, '{\"theme_color\":\"#ee5d1d\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/setting/theme-color', '2026-08-04 03:41:22', '2026-08-04 03:41:22');

INSERT INTO `master_log_aktivitas` VALUES (8, 1, 'Memperbarui Warna Theme Website ke #dc2626', 'MasterSetting', NULL, NULL, '{\"theme_color\":\"#dc2626\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/setting/theme-color', '2026-08-04 03:41:37', '2026-08-04 03:41:37');

INSERT INTO `master_log_aktivitas` VALUES (9, 1, 'Memperbarui Warna Theme Website ke #004b49', 'MasterSetting', NULL, NULL, '{\"theme_color\":\"#004b49\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/setting/theme-color', '2026-08-04 03:47:54', '2026-08-04 03:47:54');

INSERT INTO `master_log_aktivitas` VALUES (10, 1, 'Memperbarui Warna Theme Website ke #1e293b', 'MasterSetting', NULL, NULL, '{\"theme_color\":\"#1e293b\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/setting/theme-color', '2026-08-04 03:48:03', '2026-08-04 03:48:03');

INSERT INTO `master_log_aktivitas` VALUES (11, 1, 'Memperbarui Warna Theme Website ke #059669', 'MasterSetting', NULL, NULL, '{\"theme_color\":\"#059669\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/setting/theme-color', '2026-08-04 03:48:57', '2026-08-04 03:48:57');

INSERT INTO `master_log_aktivitas` VALUES (12, 1, 'Memperbarui Warna Theme Website ke #1e293b', 'MasterSetting', NULL, NULL, '{\"theme_color\":\"#1e293b\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/setting/theme-color', '2026-08-04 03:49:09', '2026-08-04 03:49:09');

INSERT INTO `master_log_aktivitas` VALUES (13, 1, 'Memperbarui Warna Theme Website ke #004b49', 'MasterSetting', NULL, NULL, '{\"theme_color\":\"#004b49\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/setting/theme-color', '2026-08-04 06:44:38', '2026-08-04 06:44:38');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
