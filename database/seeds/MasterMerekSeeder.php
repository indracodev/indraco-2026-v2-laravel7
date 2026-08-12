<?php

// Seeder generated from c:/laragon/www/#Project2026/indracocoffee-v2-laravel-7/db/db-indracocoffee-v2-laravel-10.sql for master_merek

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterMerekSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_merek')->truncate();

        DB::unprepared(<<<'SQL'
INSERT INTO `master_merek` VALUES (1, 'Tugu Buaya', 'tugu-buaya', 'images/uploads/brand/tugu-buaya_1774403899.png', 'Bercita rasa kuat serta tekstur tegas. Dikembangkan sejak 1977, Tugu Buaya memiliki rasa yang unik dengan karakter kopi yang diterima semua orang.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:58:19');

INSERT INTO `master_merek` VALUES (2, 'Uang Emas', 'uang-emas', 'images/uploads/brand/uang-emas_1774403882.png', 'Dibuat dari biji kopi pilihan, cobalah kopi asli dengan paduan metode pengolahan tradisional dan modern ini. Dari kreasi kopi hitam yang sesungguhnya, temukan nuansa kontemporer yang tiada duanya.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:58:02');

INSERT INTO `master_merek` VALUES (3, 'Rasa Sayang', 'rasa-sayang', 'images/uploads/brand/rasa-sayang_1774403865.png', 'Rasa sayang eh, Rasa sayang sayang eh ~ Diracik pada 1984 dengan rasa dan aroma nostalgia, Rasa sayang membawa penghormatan bagi kopi di masa lalu, sekaligus memupuk rasa nostalgia yang semakin hangat dengan teknik presisi yang lebih baru.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:57:45');

INSERT INTO `master_merek` VALUES (4, 'HaoCafe', 'hao-cafe', 'images/uploads/brand/hao-cafe_1774585550.png', 'Kopi yang dibuat secara sempurna dengan tekstur kuat yang mengeluarkan aroma khas dan rasa yang mantap.', NULL, 'active', '2026-03-17 15:07:41', '2026-04-10 13:53:08');

INSERT INTO `master_merek` VALUES (5, 'Jaheku', 'jaheku', 'images/uploads/brand/jaheku_1774403821.png', 'Jaheku / definisi / “Jahe kesukaanku” dalam bahasa Indonesia. Merupakan bahan pangan yang familiar di banyak negara, Jaheku menyajikan segala manfaat dan kesegaran jahe kepada konsumen dalam bentuk minuman, dengan kombinasi rasa Jaheku Gula Aren, dan juga Jaheku Madu, memantapkan berbagai manfaat serta rasa unik jahe yang selalu disukai.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:57:01');

INSERT INTO `master_merek` VALUES (6, 'BROCHOCO', 'brochoco', 'images/uploads/brand/brochoco_1774403800.png', 'Mau minuman coklat dengan berbagai rasa pilihan? BROCHOCO jawabannya! Isi hari-harimu dengan BROCHOCO, dengan rasa Original juga Choco Banana. Nikmati beragam rasa manisnya coklat dan lembutnya krim, berpadu seimbang dalam cita rasa yang menggoda. Favorit semua kalangan dan selalu jadi pilihan, dengan berbagai kreasi penyajian yang lezat.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:56:40');

INSERT INTO `master_merek` VALUES (7, 'UCAFÉ', 'ucafe', 'images/uploads/brand/ucafe_1774403779.png', 'UCAFÉ for “U”. Dirancang untuk menyatukan dunia peminum kopi dari berbagai latar, dengan ragam rasa dan aromanya, UCAFÉ terdepan menemani dirimu yang sesungguhnya, menjaga cita-cita, impian, dan juga kesukaanmu.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:56:19');

INSERT INTO `master_merek` VALUES (8, 'Supresso', 'supresso', 'images/uploads/brand/supresso_1773886613.png', 'Dengan biji-biji kopi yang berasal dari timur hingga barat Indonesia, koleksi kopi single-origin Supresso menghasilkan profil rasa yang premium, mewah sekaligus unik. Dengan sepenuh hati, kami fokus menyajikan kopi kualitas tinggi untuk penikmat kopi di seluruh dunia dalam bentuk biji, bubuk, drip, dan kapsul. Nikmati pengalaman kopi Indonesia dalam kualitas dan kemurniannya, bersama Supresso.', 'With coffee beans sourced from east to west Indonesia, Supresso\'s single-origin coffee collection delivers premium, luxurious, and unique flavor profiles. We wholeheartedly focus on serving high-quality coffee to coffee lovers worldwide in bean, ground, drip, and capsule forms. Experience Indonesian coffee in its purest form with Supresso.', 'active', '2026-03-17 15:07:41', '2026-04-08 13:39:33');

INSERT INTO `master_merek` VALUES (9, 'BaliCafé', 'balicafe', 'images/uploads/brand/balicafe_1774403760.png', 'Diracik dari kopi Bali asli, nikmati hasil kreasi Balicafé kami, dan menyatulah dengan tradisi kopi pulau Bali yang magis.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:56:00');

INSERT INTO `master_merek` VALUES (10, 'Mesin', 'mesin', 'images/uploads/brand/mesin_1774404402.jpg', 'Mesin-mesin & peralatan khusus yang dirancang untuk menyajikan kualitas terbaik bagi setiap cangkir kopi Anda.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 09:06:42');

INSERT INTO `master_merek` VALUES (11, 'intiRasa', 'intirasa', 'images/uploads/brand/intirasa_1774403708.png', 'Santan bubuk intiRasa merupakan versi praktis dari cita rasa gurih ala santan kelapa yang sesungguhnya, berkualitas dan disesuaikan dengan kebutuhan dapur anda yang serba cepat.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-25 08:55:08');

INSERT INTO `master_merek` VALUES (12, 'Others', 'others', NULL, 'Koleksi produk lainnya dari Indraco.', NULL, 'active', '2026-03-17 15:07:41', '2026-03-17 15:07:41');

INSERT INTO `master_merek` VALUES (13, 'Kopi Ceria', 'kopi-ceria', 'images/uploads/brand/1782967880_logo-kopi-ceria-baru.png', NULL, NULL, 'active', '2026-07-02 04:51:20', '2026-07-02 04:51:20');
SQL
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
