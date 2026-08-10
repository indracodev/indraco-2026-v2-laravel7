<?php

use Illuminate\Database\Seeder;
use App\Models\MasterMerek;

class MasterMerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mereks = [
            [
                'id' => 1,
                'nama_merek' => 'Tugu Buaya',
                'slug' => 'tugu-buaya',
                'logo_path' => 'images/uploads/brand/tugu-buaya_1774403899.png',
                'deskripsi' => 'Bercita rasa kuat serta tekstur mantap',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 2,
                'nama_merek' => 'Uang Emas',
                'slug' => 'uang-emas',
                'logo_path' => 'images/uploads/brand/uang-emas_1774403882.png',
                'deskripsi' => 'Dibuat dari biji kopi pilihan',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 3,
                'nama_merek' => 'Rasa Sayang',
                'slug' => 'rasa-sayang',
                'logo_path' => 'images/uploads/brand/rasa-sayang_1774403865.png',
                'deskripsi' => 'Rasa sayang eh, Rasa sayang',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 4,
                'nama_merek' => 'HaoCafe',
                'slug' => 'hao-cafe',
                'logo_path' => 'images/uploads/brand/hao-cafe_1774585550.png',
                'deskripsi' => 'Kopi yang dibuat secara sempurna',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 5,
                'nama_merek' => 'Jaheku',
                'slug' => 'jaheku',
                'logo_path' => 'images/uploads/brand/jaheku_1774403821.png',
                'deskripsi' => 'Jaheku / definisi / "Jahe kesukaanmu"',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 6,
                'nama_merek' => 'BROCHOCO',
                'slug' => 'brochoco',
                'logo_path' => 'images/uploads/brand/brochoco_1774403800.png',
                'deskripsi' => 'Mau minuman coklat dengan cita rasa mantap',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 7,
                'nama_merek' => 'UCAFÉ',
                'slug' => 'ucafe',
                'logo_path' => 'images/uploads/brand/ucafe_1774403779.png',
                'deskripsi' => 'UCAFÉ for "U". Dirancang untuk Anda',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 8,
                'nama_merek' => 'Supresso',
                'slug' => 'supresso',
                'logo_path' => 'images/uploads/brand/supresso_1773886613.png',
                'deskripsi' => 'Dengan biji-biji kopi yang berkualitas',
                'deskripsi_eng' => 'With coffee beans sourced from pristine volcanic highlands',
                'status' => 'active',
            ],
            [
                'id' => 9,
                'nama_merek' => 'BaliCafé',
                'slug' => 'balicafe',
                'logo_path' => 'images/uploads/brand/balicafe_1774403760.png',
                'deskripsi' => 'Diracik dari kopi Bali asli, nikmati sensasinya',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 10,
                'nama_merek' => 'Mesin',
                'slug' => 'mesin',
                'logo_path' => 'images/uploads/brand/mesin_1774404402.jpg',
                'deskripsi' => 'Mesin-mesin & peralatan khusus pembuat kopi',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 11,
                'nama_merek' => 'intiRasa',
                'slug' => 'intirasa',
                'logo_path' => 'images/uploads/brand/intirasa_1774403708.png',
                'deskripsi' => 'Santan bubuk intiRasa merupakan olahan santan kelapa murni',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 12,
                'nama_merek' => 'Others',
                'slug' => 'others',
                'logo_path' => null,
                'deskripsi' => 'Koleksi produk lainnya dari Indraco',
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
            [
                'id' => 13,
                'nama_merek' => 'Kopi Ceria',
                'slug' => 'kopi-ceria',
                'logo_path' => null,
                'deskripsi' => null,
                'deskripsi_eng' => null,
                'status' => 'active',
            ],
        ];

        foreach ($mereks as $merek) {
            MasterMerek::updateOrCreate(['id' => $merek['id']], $merek);
        }
    }
}
