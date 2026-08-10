<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterLogAktivitas;
use App\Models\MasterSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $headerLogo = MasterSetting::get('header_logo');
        $footerLogo = MasterSetting::get('footer_logo');
        $siteTitle = MasterSetting::get('site_title', 'INDRACO Est. 1971');

        $sosmed = [
            'facebook' => [
                'name' => 'Facebook',
                'url' => MasterSetting::get('sosmed_facebook_url', 'https://facebook.com'),
                'active' => MasterSetting::get('sosmed_facebook_active', '1'),
            ],
            'instagram' => [
                'name' => 'Instagram',
                'url' => MasterSetting::get('sosmed_instagram_url', 'https://instagram.com'),
                'active' => MasterSetting::get('sosmed_instagram_active', '1'),
            ],
            'youtube' => [
                'name' => 'YouTube',
                'url' => MasterSetting::get('sosmed_youtube_url', 'https://youtube.com'),
                'active' => MasterSetting::get('sosmed_youtube_active', '1'),
            ],
            'tiktok' => [
                'name' => 'TikTok',
                'url' => MasterSetting::get('sosmed_tiktok_url', 'https://tiktok.com'),
                'active' => MasterSetting::get('sosmed_tiktok_active', '1'),
            ],
            'linkedin' => [
                'name' => 'LinkedIn',
                'url' => MasterSetting::get('sosmed_linkedin_url', 'https://linkedin.com'),
                'active' => MasterSetting::get('sosmed_linkedin_active', '1'),
            ],
            'whatsapp' => [
                'name' => 'WhatsApp',
                'url' => MasterSetting::get('sosmed_whatsapp_url', 'https://whatsapp.com'),
                'active' => MasterSetting::get('sosmed_whatsapp_active', '1'),
            ],
        ];

        // Page Settings Defaults
        $pageSettings = [
            'home' => [
                'about_title' => MasterSetting::get('page_home_about_title', 'ABOUT US'),
                'about_headline' => MasterSetting::get('page_home_about_headline', 'Uniting through flavour, connecting through life.'),
                'about_content' => MasterSetting::get('page_home_about_content', 'Kami INDRACO – Dimulai pada tahun 1971 dengan gudang di Sumatera oleh pendiri kami, kami telah terus tumbuh dan berkembang menjadi beberapa fasilitas manufaktur canggih di seluruh Indonesia dan Singapura.'),
                'about_image' => MasterSetting::get('page_home_about_image', 'images/home-about.jpg'),
                'careers_title' => MasterSetting::get('page_home_careers_title', 'CAREERS'),
                'careers_headline' => MasterSetting::get('page_home_careers_headline', 'Shape your career and grow together with INDRACO.'),
                'careers_content' => MasterSetting::get('page_home_careers_content', 'Jadilah bagian dari perjalanan kami dalam menyajikan cita rasa terbaik kopi Indonesia ke mancanegara.'),
                'careers_image' => MasterSetting::get('page_home_careers_image', 'images/home-careers.jpg'),
            ],
            'about' => [
                'title' => MasterSetting::get('page_about_title', 'ABOUT US'),
                'subtitle' => MasterSetting::get('page_about_subtitle', 'A Journey of Passion, Quality, and Coffee Heritage.'),
                'heading' => MasterSetting::get('page_about_heading', 'Our Heritage & Passion for Quality Coffee'),
                'content' => MasterSetting::get('page_about_content', 'Dimulai pada tahun 1971 dengan gudang sederhana di Sumatera, INDRACO telah bertransformasi menjadi pemimpin industri kopi dan minuman terkemuka.'),
                'image' => MasterSetting::get('page_about_image', 'images/icon-about.png'),
            ],
            'business' => [
                'title' => MasterSetting::get('page_business_title', 'OUR BUSINESSES'),
                'subtitle' => MasterSetting::get('page_business_subtitle', 'Explore Our Multi-Brand Coffee & Beverage Ecosystem.'),
                'heading' => MasterSetting::get('page_business_heading', 'Empowering Global Coffee & Beverage Businesses'),
                'content' => MasterSetting::get('page_business_content', 'Dari fasilitas manufaktur modern hingga jaringan distribusi global, INDRACO menghadirkan portofolio kopi, cokelat, dan jahe terbaik.'),
                'image' => MasterSetting::get('page_business_image', 'images/icon-business.png'),
            ],
            'store' => [
                'title' => MasterSetting::get('page_store_title', 'ONLINE STORE'),
                'subtitle' => MasterSetting::get('page_store_subtitle', 'Discover Our Official E-Commerce Stores & Marketplace Links.'),
                'heading' => MasterSetting::get('page_store_heading', 'Beli Produk Resmi INDRACO Secara Online'),
                'content' => MasterSetting::get('page_store_content', 'Kunjungi toko resmi Supresso, Indraco Store, Shopee, Tokopedia, Lazada, Blibli, dan TikTok Shop.'),
                'image' => MasterSetting::get('page_store_image', 'images/icon-store.png'),
            ],
            'careers' => [
                'title' => MasterSetting::get('page_careers_title', 'CAREERS'),
                'subtitle' => MasterSetting::get('page_careers_subtitle', 'Build Your Legacy with a Passionate Team.'),
                'heading' => MasterSetting::get('page_careers_heading', 'Bergabung & Berkembang Bersama INDRACO'),
                'content' => MasterSetting::get('page_careers_content', 'Temukan peluang karir profesional di JobStreet dan LinkedIn resmi kami.'),
                'image' => MasterSetting::get('page_careers_image', 'images/icon-career.png'),
            ],
            'contact' => [
                'title' => MasterSetting::get('page_contact_title', 'CONTACT US'),
                'subtitle' => MasterSetting::get('page_contact_subtitle', 'Get in Touch with Our Global Headquarters.'),
                'address' => MasterSetting::get('page_contact_address', 'Jl. Raya Mayjen Sungkono No. 123, Surabaya, Jawa Timur, Indonesia'),
                'phone' => MasterSetting::get('page_contact_phone', '+62 31 1234567'),
                'email' => MasterSetting::get('page_contact_email', 'info@indraco.com'),
                'image' => MasterSetting::get('page_contact_image', 'images/icon-contact.png'),
            ],
            'privacy' => [
                'title' => MasterSetting::get('page_privacy_title', 'PRIVACY POLICY'),
                'content' => MasterSetting::get('page_privacy_content', 'Kebijakan Privasi INDRACO menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda...'),
            ],
            'terms' => [
                'title' => MasterSetting::get('page_terms_title', 'TERMS & CONDITIONS'),
                'content' => MasterSetting::get('page_terms_content', 'Syarat dan Ketentuan penggunaan website resmi INDRACO Est. 1971...'),
            ],
            'dataprotection' => [
                'title' => MasterSetting::get('page_dataprotection_title', 'INFORMATION ON DATA PROTECTION'),
                'content' => MasterSetting::get('page_dataprotection_content', 'Informasi mengenai Perlindungan Data Pribadi sesuai regulasi yang berlaku...'),
            ],
            'help' => [
                'title' => MasterSetting::get('page_help_title', 'HELP CENTER & FAQ'),
                'content' => MasterSetting::get('page_help_content', 'Pusat Bantuan dan Pertanyaan Umum mengenai produk, pembelian, serta informasi INDRACO...'),
            ],
        ];

        $themeColor = MasterSetting::get('theme_color', '#004b49');

        return view('admin.setting.index', compact('headerLogo', 'footerLogo', 'siteTitle', 'sosmed', 'pageSettings', 'themeColor'));
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'header_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $oldLogo = MasterSetting::get('header_logo');

        if ($request->hasFile('header_logo')) {
            if ($oldLogo && file_exists(public_path($oldLogo)) && !str_contains($oldLogo, 'logo-indraco')) {
                @unlink(public_path($oldLogo));
            }

            $path = 'storage/' . $request->file('header_logo')->store('images/logo', 'public');
            MasterSetting::set('header_logo', $path, 'header');

            MasterLogAktivitas::create([
                'user_id' => auth()->id(),
                'aktivitas' => 'Memperbarui Logo Header Website',
                'model' => 'MasterSetting',
                'data_baru' => ['header_logo' => $path],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl(),
            ]);

            return redirect()->route('admin.setting.index')->with('success', 'Logo Header website berhasil diperbarui!');
        }

        return redirect()->route('admin.setting.index')->with('error', 'Gagal mengunggah berkas logo header.');
    }

    public function resetLogo(Request $request)
    {
        $oldLogo = MasterSetting::get('header_logo');
        if ($oldLogo && file_exists(public_path($oldLogo)) && !str_contains($oldLogo, 'logo-indraco')) {
            @unlink(public_path($oldLogo));
        }

        MasterSetting::set('header_logo', null, 'header');

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Reset Logo Header ke Standar (Bawaan Template)',
            'model' => 'MasterSetting',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.setting.index')->with('success', 'Logo Header dikembalikan ke standar bawaan website.');
    }

    public function updateFooterLogo(Request $request)
    {
        $request->validate([
            'footer_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $oldLogo = MasterSetting::get('footer_logo');

        if ($request->hasFile('footer_logo')) {
            if ($oldLogo && file_exists(public_path($oldLogo)) && !str_contains($oldLogo, 'logo-indraco')) {
                @unlink(public_path($oldLogo));
            }

            $path = 'storage/' . $request->file('footer_logo')->store('images/logo', 'public');
            MasterSetting::set('footer_logo', $path, 'footer');

            MasterLogAktivitas::create([
                'user_id' => auth()->id(),
                'aktivitas' => 'Memperbarui Logo Footer Website',
                'model' => 'MasterSetting',
                'data_baru' => ['footer_logo' => $path],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl(),
            ]);

            return redirect()->route('admin.setting.index')->with('success', 'Logo Footer website berhasil diperbarui!');
        }

        return redirect()->route('admin.setting.index')->with('error', 'Gagal mengunggah berkas logo footer.');
    }

    public function resetFooterLogo(Request $request)
    {
        $oldLogo = MasterSetting::get('footer_logo');
        if ($oldLogo && file_exists(public_path($oldLogo)) && !str_contains($oldLogo, 'logo-indraco')) {
            @unlink(public_path($oldLogo));
        }

        MasterSetting::set('footer_logo', null, 'footer');

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Reset Logo Footer ke Standar (Bawaan Template)',
            'model' => 'MasterSetting',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.setting.index')->with('success', 'Logo Footer dikembalikan ke standar bawaan website.');
    }

    public function updateSosmed(Request $request)
    {
        $platforms = ['facebook', 'instagram', 'youtube', 'tiktok', 'linkedin', 'whatsapp'];

        foreach ($platforms as $platform) {
            $urlKey = 'sosmed_' . $platform . '_url';
            $activeKey = 'sosmed_' . $platform . '_active';

            if ($request->has($urlKey)) {
                MasterSetting::set($urlKey, $request->input($urlKey), 'sosmed');
            }

            $isActive = $request->has($activeKey) ? '1' : '0';
            MasterSetting::set($activeKey, $isActive, 'sosmed');
        }

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Memperbarui Tautan & Status Active Media Sosial Footer',
            'model' => 'MasterSetting',
            'data_baru' => $request->all(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.setting.index')->with('success', 'Tautan dan Status Media Sosial berhasil diperbarui!');
    }

    public function updatePageContent(Request $request)
    {
        $pageGroup = $request->input('page_group', 'page');
        $inputs = $request->except(['_token', 'page_group', 'active_tab']);

        foreach ($inputs as $key => $value) {
            if ($request->hasFile($key)) {
                $oldFile = MasterSetting::get($key);
                if ($oldFile && file_exists(public_path($oldFile)) && !str_starts_with($oldFile, 'images/')) {
                    @unlink(public_path($oldFile));
                }

                $filePath = 'storage/' . $request->file($key)->store('images/pages', 'public');
                MasterSetting::set($key, $filePath, $pageGroup);
            } elseif (is_string($value)) {
                MasterSetting::set($key, $value, $pageGroup);
            }
        }

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Memperbarui Konten Halaman: ' . strtoupper($pageGroup),
            'model' => 'MasterSetting',
            'data_baru' => $inputs,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        $activeTab = $request->input('active_tab', 'tab-general');
        return redirect()->to(route('admin.setting.index') . '#' . $activeTab)->with('success', 'Konten halaman ' . strtoupper($pageGroup) . ' berhasil diperbarui!');
    }

    public function updateThemeColor(Request $request)
    {
        $request->validate([
            'theme_color' => 'required|string|regex:/^#[a-fA-F0-9]{6}$/',
        ]);

        $color = $request->input('theme_color', '#004b49');
        MasterSetting::set('theme_color', $color, 'theme');

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Memperbarui Warna Theme Website ke ' . $color,
            'model' => 'MasterSetting',
            'data_baru' => ['theme_color' => $color],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->to(route('admin.setting.index') . '#tab-color')->with('success', 'Warna Theme (' . $color . ') berhasil disimpan & diterapkan ke seluruh website!');
    }

    public function resetThemeColor(Request $request)
    {
        MasterSetting::set('theme_color', '#004b49', 'theme');

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Reset Warna Theme Website ke Default (#004b49)',
            'model' => 'MasterSetting',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->to(route('admin.setting.index') . '#tab-color')->with('success', 'Warna Theme dikembalikan ke warna default (#004b49).');
    }
}
