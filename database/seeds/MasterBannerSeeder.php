<?php

// Seeder for Laravel 7

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterBannerSeeder extends Seeder
{
    /**
     * Seed data banner awal yang terintegrasi dengan 3D Hero Product Slider di Landing Page.
     *
     * Field mapping:
     * - title_id / title_en : Teks Oranye Raksasa (contoh: COFFEE, GINGER, CHOCOLATE, COCONUT)
     * - subtitle_id         : Deskripsi singkat di sudut kiri bawah slider
     * - image_path          : Gambar produk pada pedestal 3D
     * - link                : Tautan saat gambar produk diklik
     * - order_num           : Urutan slide
     */
    public function run(): void
    {
        // Hapus data lama sebelum seed ulang
        DB::table('master_banners')->truncate();

        $now = now();

        $banners = [
            // ── Slide 1: COFFEE ────────────────────────────────────────────────
            [
                'image_path'     => 'images/coffee-bean.png',
                'title_id'       => 'COFFEE',
                'title_en'       => 'COFFEE',
                'subtitle_id'    => 'Enjoy a selection of quality coffee with a distinctive aroma.',
                'subtitle_en'    => 'Enjoy a selection of quality coffee with a distinctive aroma.',
                'link'           => '/products',
                'button_text_id' => 'Explore Coffee',
                'button_text_en' => 'Explore Coffee',
                'order_num'      => 1,
                'is_active'      => 1,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],

            // ── Slide 2: GINGER ────────────────────────────────────────────────
            [
                'image_path'     => 'images/ginger.png',
                'title_id'       => 'GINGER',
                'title_en'       => 'GINGER',
                'subtitle_id'    => 'Experience the warm, comforting, and soothing properties of our selected ginger.',
                'subtitle_en'    => 'Experience the warm, comforting, and soothing properties of our selected ginger.',
                'link'           => '/products',
                'button_text_id' => 'Explore Ginger',
                'button_text_en' => 'Explore Ginger',
                'order_num'      => 2,
                'is_active'      => 1,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],

            // ── Slide 3: CHOCOLATE ─────────────────────────────────────────────
            [
                'image_path'     => 'images/chocolate.png',
                'title_id'       => 'CHOCOLATE',
                'title_en'       => 'CHOCOLATE',
                'subtitle_id'    => 'Indulge in the rich, deep, and smooth flavors of premium quality chocolate drink.',
                'subtitle_en'    => 'Indulge in the rich, deep, and smooth flavors of premium quality chocolate drink.',
                'link'           => '/products',
                'button_text_id' => 'Explore Chocolate',
                'button_text_en' => 'Explore Chocolate',
                'order_num'      => 3,
                'is_active'      => 1,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],

            // ── Slide 4: COCONUT ───────────────────────────────────────────────
            [
                'image_path'     => 'images/coconut.png',
                'title_id'       => 'COCONUT',
                'title_en'       => 'COCONUT',
                'subtitle_id'    => 'Delight in the fresh, creamy, and tropical taste of our premium coconut milk.',
                'subtitle_en'    => 'Delight in the fresh, creamy, and tropical taste of our premium coconut milk.',
                'link'           => '/products',
                'button_text_id' => 'Explore Coconut',
                'button_text_en' => 'Explore Coconut',
                'order_num'      => 4,
                'is_active'      => 1,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
        ];

        DB::table('master_banners')->insert($banners);

        $this->command->info('✅ MasterBannerSeeder: ' . count($banners) . ' banner 3D slider berhasil ditambahkan.');
        $this->command->line('');
        $this->command->table(
            ['Order', 'Teks Oranye (Title)', 'Deskripsi (Subtitle)', 'Image Path', 'Status'],
            collect($banners)->map(function ($b) {
                return [
                    $b['order_num'],
                    $b['title_id'],
                    $b['subtitle_id'],
                    $b['image_path'],
                    $b['is_active'] ? '✅ Active' : '⏸ Inactive',
                ];
            })->toArray()
        );
    }
}
