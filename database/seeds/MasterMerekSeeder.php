<?php

// Seeder for Laravel 7

use App\Models\MasterMerek;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MasterMerekSeeder extends Seeder
{
    public function run(): void
    {
        $mereks = [
            [
                'nama_merek' => 'Supresso',
                'logo_path' => 'images/logo-supresso.png',
                'deskripsi' => 'Dengan biji-biji kopi yang berkualitas',
                'deskripsi_eng' => 'With high quality coffee beans',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'BaliCafé',
                'logo_path' => 'images/logo-balicafe.png',
                'deskripsi' => 'Kenikmatan kopi khas Bali.',
                'deskripsi_eng' => 'The authentic pleasure of Balinese coffee.',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'UCAFÉ',
                'logo_path' => 'images/logo-ucafe.png',
                'deskripsi' => 'UCAFÉ for "U" Dirancang untuk Anda',
                'deskripsi_eng' => 'UCAFÉ designed for you',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'Rasa Sayang',
                'logo_path' => 'images/logo-rasa-sayang.png',
                'deskripsi' => 'Rasa sayang eh, Rasa sayang',
                'deskripsi_eng' => 'Heartwarming coffee experience.',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'Tugu Buaya',
                'logo_path' => 'images/logo-tugu-buaya.png',
                'deskripsi' => 'Bercita rasa kuat serta bertekstur mantap',
                'deskripsi_eng' => 'Strong flavor and bold texture',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'Uang Emas',
                'logo_path' => 'images/logo-uang-emas.png',
                'deskripsi' => 'Dibuat dari biji kopi pilihan',
                'deskripsi_eng' => 'Made from selected coffee beans',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'BROCHOCO',
                'logo_path' => 'images/logo-brochoco.png',
                'deskripsi' => 'Mau minuman coklat dengan cita rasa mantap',
                'deskripsi_eng' => 'Delicious and rich chocolate drink.',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'Jaheku',
                'logo_path' => 'images/logo-jaheku.png',
                'deskripsi' => 'Jaheku / definisi / "Jahe kesukaanmu"',
                'deskripsi_eng' => 'Your favorite ginger drink',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'intiRasa',
                'logo_path' => 'images/logo-intirasa.png',
                'deskripsi' => 'Esensi rasa murni pilihan.',
                'deskripsi_eng' => 'Pure essence of select taste.',
                'status' => 'active',
            ],
            [
                'nama_merek' => 'HaoCafe',
                'logo_path' => 'images/logo-haocafe.png',
                'deskripsi' => 'Kopi yang dibuat secara sempurna',
                'deskripsi_eng' => 'Perfection in every cup of coffee',
                'status' => 'active',
            ],
        ];

        foreach ($mereks as $merek) {
            MasterMerek::updateOrCreate(
                ['slug' => Str::slug($merek['nama_merek'])],
                $merek
            );
        }
    }
}
