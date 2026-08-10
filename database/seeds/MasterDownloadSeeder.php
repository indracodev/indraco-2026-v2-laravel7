<?php

// Seeder for Laravel 7

use App\Models\MasterDownload;
use Illuminate\Database\Seeder;

class MasterDownloadSeeder extends Seeder
{
    public function run(): void
    {
        $downloads = [
            [
                'judul' => 'Supresso Product Catalog',
                'judul_eng' => 'Supresso Product Catalog & Origin Guide',
                'kategori' => 'Catalog & Brochure',
                'deskripsi' => 'Katalog produk lengkap Supresso Single Origin Coffee & Beans.',
                'image_path' => 'images/brochure-supresso.png',
                'file_path' => null,
                'file_size' => '4.2 MB',
                'order_num' => 1,
                'is_active' => true,
            ],
            [
                'judul' => 'Ucafe Product Catalog',
                'judul_eng' => 'Ucafe Beverage & Blend Catalog',
                'kategori' => 'Catalog & Brochure',
                'deskripsi' => 'Katalog lengkap varian UCAFÉ instant coffee & milk blend.',
                'image_path' => 'images/brochure-ucafe.png',
                'file_path' => null,
                'file_size' => '3.5 MB',
                'order_num' => 2,
                'is_active' => true,
            ],
            [
                'judul' => 'Brochoco Product Catalog',
                'judul_eng' => 'Brochoco Chocolate Beverage Catalog',
                'kategori' => 'Catalog & Brochure',
                'deskripsi' => 'Katalog varian minuman cokelat premium BROCHOCO.',
                'image_path' => 'images/brochure-brochoco.png',
                'file_path' => null,
                'file_size' => '2.8 MB',
                'order_num' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($downloads as $item) {
            MasterDownload::updateOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }
    }
}
