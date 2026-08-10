<?php

// Seeder for Laravel 7

use App\Models\MasterNews;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MasterNewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsData = [
            [
                'judul' => 'Event Heritage Asli Kabupaten Pasuruan',
                'judul_eng' => 'Heritage Event Asli Kabupaten Pasuruan',
                'slug' => 'event-heritage-asli-kabupaten-pasuruan',
                'tanggal' => 'May 20, 2026',
                'tanggal_eng' => 'May 20, 2026',
                'content' => 'Pasuruan memiliki kekayaan budaya dan sejarah yang luar biasa. INDRACO berpartisipasi aktif dalam mendukung kegiatan Heritage Asli Kabupaten Pasuruan untuk mempromosikan warisan budaya lokal serta mempererat hubungan dengan masyarakat sekitar.',
                'content_eng' => 'Pasuruan has an extraordinary cultural and historical heritage. INDRACO actively participates in supporting the Original Heritage event of Pasuruan Regency to promote local cultural heritage and strengthen bonds with the community.',
                'image_path' => 'images/news/news-1.jpg',
            ],
            [
                'judul' => 'Komitmen Indraco untuk Wellbeing Karyawan',
                'judul_eng' => 'Indraco Commitment for Employee Wellbeing',
                'slug' => 'komitmen-indraco-untuk-wellbeing-karyawan',
                'tanggal' => 'May 10, 2026',
                'tanggal_eng' => 'May 10, 2026',
                'content' => 'Kesejahteraan dan kesehatan karyawan merupakan prioritas utama INDRACO. Berbagai program kebugaran, pemeriksaan kesehatan berkala, fasilitas kerja yang nyaman, dan dukungan lingkungan kerja terpadu terus dihadirkan demi menciptakan tim yang produktif dan bahagia.',
                'content_eng' => 'Employee wellbeing and health are top priorities at INDRACO. Various fitness programs, regular health checkups, comfortable working facilities, and integrated work environment support are continuously provided to create a happy, productive team.',
                'image_path' => 'images/news/news-2.jpg',
            ],
            [
                'judul' => 'Produk Baru dari Kopi Tugu Buaya',
                'judul_eng' => 'New Product Launch from Kopi Tugu Buaya',
                'slug' => 'produk-baru-dari-kopi-tugu-buaya',
                'tanggal' => 'April 28, 2026',
                'tanggal_eng' => 'April 28, 2026',
                'content' => 'Kopi Tugu Buaya secara resmi meluncurkan varian produk kemasan baru dengan penawaran menarik beli 1 gratis 1 piring dan gelas eksklusif. Varian ini memberikan cita rasa kopi mantap nan legendaris khas Jawa Timur.',
                'content_eng' => 'Kopi Tugu Buaya officially launches a new packaged product variant with exciting buy 1 get 1 free plate and exclusive glass offers. This variant delivers the bold and legendary coffee taste signature of East Java.',
                'image_path' => 'images/news/news-3.jpg',
            ],
            [
                'judul' => 'Keikutsertaan Indraco di Pameran Internasional',
                'judul_eng' => 'Indraco Participation in International Exhibition',
                'slug' => 'keikutsertaan-indraco-di-pameran-internasional',
                'tanggal' => 'April 15, 2026',
                'tanggal_eng' => 'April 15, 2026',
                'content' => 'INDRACO kembali memamerkan jajaran produk olahan kopi, krimer, dan minuman berkualitas internasional pada ajang pameran dagang internasional. Langkah ini merupakan bagian dari ekspansi pasar global perusahaan.',
                'content_eng' => 'INDRACO once again exhibits its lineup of coffee, non-dairy creamer, and beverage products of international quality at the international trade exhibition. This step is part of the company\'s global market expansion.',
                'image_path' => 'images/news/news-4.jpg',
            ],
            [
                'judul' => 'Program Donasi Indraco Peduli Lingkungan',
                'judul_eng' => 'Indraco Environmental Care Donation Program',
                'slug' => 'program-donasi-indraco-peduli-lingkungan',
                'tanggal' => 'April 02, 2026',
                'tanggal_eng' => 'April 02, 2026',
                'content' => 'Sebagai bentuk kepedulian terhadap kelestarian alam dan lingkungan hidup, INDRACO menyelenggarakan program penanaman pohon dan aksi donasi peduli lingkungan bersama komunitas lokal di sekitar area operasional pabrik.',
                'content_eng' => 'As part of our commitment to environmental sustainability, INDRACO organizes tree planting programs and environmental care donations alongside local communities around our factory operational area.',
                'image_path' => 'images/news/news-5.jpg',
            ],
            [
                'judul' => 'Pelatihan Barista Bersama Kopi Supresso',
                'judul_eng' => 'Barista Training with Supresso Coffee',
                'slug' => 'pelatihan-barista-bersama-kopi-supresso',
                'tanggal' => 'March 18, 2026',
                'tanggal_eng' => 'March 18, 2026',
                'content' => 'Supresso mengadakan sesi pelatihan barista profesional bagi para peracik kopi muda dan pencinta kopi speciality untuk mengasah keahlian teknik manual brew, ekstraksi espresso, dan pembuatan latte art presisi.',
                'content_eng' => 'Supresso hosts professional barista training sessions for young coffee artisans and speciality coffee enthusiasts to hone manual brewing techniques, espresso extraction, and precision latte art creation.',
                'image_path' => 'images/news/news-6.jpg',
            ],
            [
                'judul' => 'Indraco Meraih Penghargaan FMCG Terbaik 2026',
                'judul_eng' => 'Indraco Wins Best FMCG Award 2026',
                'slug' => 'indraco-meraih-penghargaan-fmcg-terbaik-2026',
                'tanggal' => 'March 05, 2026',
                'tanggal_eng' => 'March 05, 2026',
                'content' => 'Atas komitmen tinggi terhadap konsistensi mutu produk dan inovasi bisnis FMCG berkelanjutan, INDRACO dianugerahi penghargaan prestisius sebagai salah satu perusahaan FMCG terbaik tahun 2026.',
                'content_eng' => 'Due to high commitment to product quality consistency and sustainable FMCG business innovation, INDRACO was awarded the prestigious title of one of the best FMCG companies of 2026.',
                'image_path' => 'images/news/news-7.jpg',
            ],
            [
                'judul' => 'Peluncuran Supresso Speciality Series',
                'judul_eng' => 'Launch of Supresso Speciality Series',
                'slug' => 'peluncuran-supresso-speciality-series',
                'tanggal' => 'February 20, 2026',
                'tanggal_eng' => 'February 20, 2026',
                'content' => 'Supresso memperkenalkan koleksi kopi pilihan nusantara dengan profil sangrai khusus yang menonjolkan karakter keotentikan rasa khas daerah asal biji kopi Sumatra, Java, Bali, dan Toraja.',
                'content_eng' => 'Supresso introduces selected Indonesian coffee collections with specialized roast profiles highlighting authentic origin flavor notes from Sumatra, Java, Bali, and Toraja beans.',
                'image_path' => 'images/news/news-8.jpg',
            ],
            [
                'judul' => 'Inovasi Krimer Nabati Balicreamer Lebih Creamy',
                'judul_eng' => 'Richer & Creamier Balicreamer Non-Dairy Creamer Innovation',
                'slug' => 'inovasi-krimer-nabati-balicreamer-lebih-creamy',
                'tanggal' => 'February 01, 2026',
                'tanggal_eng' => 'February 01, 2026',
                'content' => 'Balicreamer meluncurkan formulasi krimer nabati premium terbaru yang lebih cepat larut dan menghasilkan tekstur lembut creamy sempurna untuk racikan kopi, teh hangat, dan kreasi minuman modern.',
                'content_eng' => 'Balicreamer launches its newest premium non-dairy creamer formulation that dissolves instantly and yields a silky, creamy texture perfect for coffee, hot tea, and modern beverage recipes.',
                'image_path' => 'images/news/news-9.jpg',
            ],
        ];

        foreach ($newsData as $data) {
            MasterNews::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
