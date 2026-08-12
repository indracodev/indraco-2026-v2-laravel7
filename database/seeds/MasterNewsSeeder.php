<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_news

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterNewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_news')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_news` VALUES (1, 'peluncuran-supresso-speciality-series', 'Peluncuran Supresso Speciality Series', 'Launch of Supresso Speciality Series', 'February 20, 2026', 'February 20, 2026', 'Supresso memperkenalkan koleksi kopi pilihan nusantara dengan profil sangrai khusus yang menonjolkan karakter keotentikan rasa khas daerah asal biji kopi Sumatra, Java, Bali, dan Toraja.', 'Supresso introduces selected Indonesian coffee collections with specialized roast profiles highlighting authentic origin flavor notes from Sumatra, Java, Bali, and Toraja beans.', 'images/news/news-8.jpg', '2026-07-31 03:03:30', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (2, 'komitmen-indraco-keberlanjutan-petani-kopi', 'Komitmen INDRACO Dalam Program Keberlanjutan Petani Kopi Indonesia', 'INDRACO Commitment to Sustainability Programs for Indonesian Coffee Farmers', '28 Juni 2026', '28 June 2026', 'Melalui program Corporate Social Responsibility (CSR), INDRACO memberikan pendampingan dan kemitraan berkelanjutan kepada ratusan petani kopi lokal guna meningkatkan produktivitas serta kualitas panen kopi nasional.', 'Through its Corporate Social Responsibility (CSR) program, INDRACO provides sustainable assistance and partnership to hundreds of local coffee farmers to increase national coffee harvest productivity and quality.', 'images/uploads/news/news-csr-farmers.jpg', '2026-07-31 03:03:30', '2026-07-31 03:03:30');

INSERT INTO `master_news` VALUES (3, 'balicreamer-formulasi-baru-krimer-nabati-premium', 'Balicreamer Hadirkan Formulasi Baru Krimer Nabati Premium Lebih Creamy', 'Balicreamer Introduces New Richer & Creamier Non-Dairy Creamer Formulation', '10 Juli 2026', '10 July 2026', 'Balicreamer meluncurkan formulasi krimer nabati terbaru yang lebih larut dan menghasilkan tekstur lembut creamy sempurna untuk racikan kopi, teh, dan minuman kekinian.', 'Balicreamer launches its newest non-dairy creamer formulation that dissolves easily and creates a rich, smooth creamy texture perfect for coffee, tea, and modern beverage recipes.', 'images/uploads/news/news-balicreamer.jpg', '2026-07-31 03:03:30', '2026-07-31 03:03:30');

INSERT INTO `master_news` VALUES (4, 'event-heritage-asli-kabupaten-pasuruan', 'Event Heritage Asli Kabupaten Pasuruan', 'Heritage Event Asli Kabupaten Pasuruan', 'May 20, 2026', 'May 20, 2026', 'Pasuruan memiliki kekayaan budaya dan sejarah yang luar biasa. INDRACO berpartisipasi aktif dalam mendukung kegiatan Heritage Asli Kabupaten Pasuruan untuk mempromosikan warisan budaya lokal serta mempererat hubungan dengan masyarakat sekitar.', 'Pasuruan has an extraordinary cultural and historical heritage. INDRACO actively participates in supporting the Original Heritage event of Pasuruan Regency to promote local cultural heritage and strengthen bonds with the community.', 'images/news/news-1.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (5, 'komitmen-indraco-untuk-wellbeing-karyawan', 'Komitmen Indraco untuk Wellbeing Karyawan', 'Indraco Commitment for Employee Wellbeing', 'May 10, 2026', 'May 10, 2026', 'Kesejahteraan dan kesehatan karyawan merupakan prioritas utama INDRACO. Berbagai program kebugaran, pemeriksaan kesehatan berkala, fasilitas kerja yang nyaman, dan dukungan lingkungan kerja terpadu terus dihadirkan demi menciptakan tim yang produktif dan bahagia.', 'Employee wellbeing and health are top priorities at INDRACO. Various fitness programs, regular health checkups, comfortable working facilities, and integrated work environment support are continuously provided to create a happy, productive team.', 'images/news/news-2.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (6, 'produk-baru-dari-kopi-tugu-buaya', 'Produk Baru dari Kopi Tugu Buaya', 'New Product Launch from Kopi Tugu Buaya', 'April 28, 2026', 'April 28, 2026', 'Kopi Tugu Buaya secara resmi meluncurkan varian produk kemasan baru dengan penawaran menarik beli 1 gratis 1 piring dan gelas eksklusif. Varian ini memberikan cita rasa kopi mantap nan legendaris khas Jawa Timur.', 'Kopi Tugu Buaya officially launches a new packaged product variant with exciting buy 1 get 1 free plate and exclusive glass offers. This variant delivers the bold and legendary coffee taste signature of East Java.', 'images/news/news-3.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (7, 'keikutsertaan-indraco-di-pameran-internasional', 'Keikutsertaan Indraco di Pameran Internasional', 'Indraco Participation in International Exhibition', 'April 15, 2026', 'April 15, 2026', 'INDRACO kembali memamerkan jajaran produk olahan kopi, krimer, dan minuman berkualitas internasional pada ajang pameran dagang internasional. Langkah ini merupakan bagian dari ekspansi pasar global perusahaan.', 'INDRACO once again exhibits its lineup of coffee, non-dairy creamer, and beverage products of international quality at the international trade exhibition. This step is part of the company\'s global market expansion.', 'images/news/news-4.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (8, 'program-donasi-indraco-peduli-lingkungan', 'Program Donasi Indraco Peduli Lingkungan', 'Indraco Environmental Care Donation Program', 'April 02, 2026', 'April 02, 2026', 'Sebagai bentuk kepedulian terhadap kelestarian alam dan lingkungan hidup, INDRACO menyelenggarakan program penanaman pohon dan aksi donasi peduli lingkungan bersama komunitas lokal di sekitar area operasional pabrik.', 'As part of our commitment to environmental sustainability, INDRACO organizes tree planting programs and environmental care donations alongside local communities around our factory operational area.', 'images/news/news-5.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (9, 'pelatihan-barista-bersama-kopi-supresso', 'Pelatihan Barista Bersama Kopi Supresso', 'Barista Training with Supresso Coffee', 'March 18, 2026', 'March 18, 2026', 'Supresso mengadakan sesi pelatihan barista profesional bagi para peracik kopi muda dan pencinta kopi speciality untuk mengasah keahlian teknik manual brew, ekstraksi espresso, dan pembuatan latte art presisi.', 'Supresso hosts professional barista training sessions for young coffee artisans and speciality coffee enthusiasts to hone manual brewing techniques, espresso extraction, and precision latte art creation.', 'images/news/news-6.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (10, 'indraco-meraih-penghargaan-fmcg-terbaik-2026', 'Indraco Meraih Penghargaan FMCG Terbaik 2026', 'Indraco Wins Best FMCG Award 2026', 'March 05, 2026', 'March 05, 2026', 'Atas komitmen tinggi terhadap konsistensi mutu produk dan inovasi bisnis FMCG berkelanjutan, INDRACO dianugerahi penghargaan prestisius sebagai salah satu perusahaan FMCG terbaik tahun 2026.', 'Due to high commitment to product quality consistency and sustainable FMCG business innovation, INDRACO was awarded the prestigious title of one of the best FMCG companies of 2026.', 'images/news/news-7.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');

INSERT INTO `master_news` VALUES (11, 'inovasi-krimer-nabati-balicreamer-lebih-creamy', 'Inovasi Krimer Nabati Balicreamer Lebih Creamy', 'Richer & Creamier Balicreamer Non-Dairy Creamer Innovation', 'February 01, 2026', 'February 01, 2026', 'Balicreamer meluncurkan formulasi krimer nabati premium terbaru yang lebih cepat larut dan menghasilkan tekstur lembut creamy sempurna untuk racikan kopi, teh hangat, dan kreasi minuman modern.', 'Balicreamer launches its newest premium non-dairy creamer formulation that dissolves instantly and yields a silky, creamy texture perfect for coffee, hot tea, and modern beverage recipes.', 'images/news/news-9.jpg', '2026-07-31 03:14:39', '2026-07-31 03:14:39');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
