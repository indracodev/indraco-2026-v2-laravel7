<?php

namespace App\Http\Controllers;

use App\Models\MasterBanner;
use App\Models\MasterKontak;
use App\Models\MasterMerek;
use App\Models\MasterNews;
use App\Models\MasterProduk;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $banners = MasterBanner::where('is_active', 1)->orderBy('order_num', 'asc')->get();
        $mereks = MasterMerek::where('status', 'active')->get();
        $featuredProducts = MasterProduk::with('merek')->where('status', 'active')->where('is_unggulan', 1)->take(8)->get();
        $latestNews = MasterNews::orderBy('created_at', 'desc')->take(9)->get();
        $brandCount = MasterMerek::count();
        $productCount = MasterProduk::count();

        return view('pages.home', compact('banners', 'mereks', 'featuredProducts', 'latestNews', 'brandCount', 'productCount'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function businesses()
    {
        return view('pages.businesses');
    }

    public function news()
    {
        $featuredNews = MasterNews::orderBy('created_at', 'desc')->first();
        $newsList = MasterNews::orderBy('created_at', 'desc')->get();
        return view('pages.news', compact('featuredNews', 'newsList'));
    }

    public function newsDetail($slug)
    {
        $news = MasterNews::where('slug', $slug)->firstOrFail();
        $relatedNews = MasterNews::where('id', '!=', $news->id)->orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.news-detail', compact('news', 'relatedNews'));
    }

    public function csr()
    {
        $latestNews = MasterNews::orderBy('created_at', 'desc')->take(9)->get();
        return view('pages.csr', compact('latestNews'));
    }

    public function careers()
    {
        return view('pages.careers');
    }

    public function downloads()
    {
        $downloads = \App\Models\MasterDownload::where('is_active', 1)->orderBy('order_num', 'asc')->get();
        return view('pages.downloads', compact('downloads'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        $nama = $request->nama ?? trim(($request->nama_depan ?? '') . ' ' . ($request->nama_belakang ?? ''));
        if (empty($nama)) {
            $nama = 'Pengunjung Website';
        }

        $telepon = $request->telepon ?? trim(($request->kode_negara ?? '') . ' ' . ($request->nomor_telepon ?? ''));

        MasterKontak::create([
            'nama' => $nama,
            'email' => $request->email,
            'telepon' => $telepon,
            'judul_pesan' => $request->judul_pesan ?? 'Pesan Formulir Kontak Website',
            'pesan' => $request->pesan,
            'tanggal_kirim' => now(),
        ]);

        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan menghubungi Anda sesegera mungkin!');
    }

    public function store()
    {
        $mereks = MasterMerek::where('status', 'active')->get();
        return view('pages.store', compact('mereks'));
    }

    public function privacyPolicy()
    {
        $title = \App\Models\MasterSetting::get('page_privacy_title', 'PRIVACY POLICY');
        $content = \App\Models\MasterSetting::get('page_privacy_content', "1. Pengumpulan Informasi Pribadi\nPT INDRACO Jaya Perkasa ('Kami') menghormati privasi Anda dan berkomitmen untuk melindungi data pribadi yang Anda bagikan saat mengakses situs web kami. Kami mengumpulkan informasi seperti nama, alamat email, nomor telepon, dan data transaksi yang Anda berikan secara sukarela melalui formulir kontak atau pendaftaran akun.\n\n2. Penggunaan Informasi\nInformasi yang dikumpulkan digunakan untuk memproses permintaan layanan, pemesanan, pengiriman katalog, serta meningkatkan kualitas layanan dan keamanan transaksi.\n\n3. Perlindungan & Keamanan Data\nKami menerapkan standar keamanan teknis dan organisasional yang ketat untuk mencegah akses tanpa izin, kehilangan, atau penyalahgunaan data pribadi Anda. Data Anda tidak akan pernah dijual atau disewakan kepada pihak ketiga tanpa persetujuan eksplisit dari Anda.");
        return view('pages.privacy-policy', compact('title', 'content'));
    }

    public function termsConditions()
    {
        $title = \App\Models\MasterSetting::get('page_terms_title', 'TERMS & CONDITIONS');
        $content = \App\Models\MasterSetting::get('page_terms_content', "1. Ketentuan Umum\nDengan mengakses dan menggunakan situs web INDRACO Est. 1971 ('Situs'), Anda menyatakan menyetujui untuk terikat oleh Syarat dan Ketentuan ini. Jika Anda tidak menyetujui bagian mana pun dari ketentuan ini, Anda disarankan untuk tidak melanjutkan penggunaan Situs.\n\n2. Hak Kekayaan Intelektual\nSeluruh konten yang terdapat di Situs ini, termasuk merek dagang Supresso, BaliCafé, UCAFÉ, Tugu Buaya, BROCHOCO, logo, teks, gambar, grafik, serta kode sumber merupakan hak cipta milik PT INDRACO Jaya Perkasa.\n\n3. Perubahan Ketentuan\nINDRACO berhak untuk mengubah atau memperbarui Syarat & Ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya.");
        return view('pages.terms-conditions', compact('title', 'content'));
    }

    public function dataProtection()
    {
        $title = \App\Models\MasterSetting::get('page_dataprotection_title', 'INFORMATION ON DATA PROTECTION');
        $content = \App\Models\MasterSetting::get('page_dataprotection_content', "1. Komitmen Perlindungan Data\nINDRACO berkomitmen penuh untuk mematuhi regulasi perlindungan data pribadi dan privasi internasional yang berlaku. Kami memastikan setiap pemrosesan data dilakukan secara transparan, sah, dan terbatas sesuai dengan tujuan yang telah ditentukan.\n\n2. Penyimpanan & Retensi Data\nData pribadi pengguna disimpan dalam infrastruktur server yang aman dan terenkripsi. Kami hanya menyimpan data pribadi selama diperlukan untuk memenuhi tujuan pengumpulannya.");
        return view('pages.data-protection', compact('title', 'content'));
    }

    public function help()
    {
        $title = \App\Models\MasterSetting::get('page_help_title', 'HELP CENTER & FAQ');
        $content = \App\Models\MasterSetting::get('page_help_content', "Pusat Bantuan & Pertanyaan Umum (FAQ) INDRACO Est. 1971\n\nQ: Bagaimana cara membeli produk kopi resmi INDRACO?\nA: Anda dapat membeli produk kami secara online melalui menu Online Store yang mengarahkan Anda ke toko resmi Supresso, Indraco Store, Shopee, Tokopedia, Lazada, Blibli, dan TikTok Shop.\n\nQ: Apakah INDRACO melayani pemesanan grosir atau kerja sama B2B?\nA: Ya, kami menyediakan layanan khusus Business to Business (B2B), fasilitas custom blend, private label/white label, serta pasokan mesin kopi profesional. Silakan hubungi kami melalui formulir Contact Us.");
        return view('pages.help', compact('title', 'content'));
    }
}
