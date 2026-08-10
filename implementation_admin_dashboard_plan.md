# Rencana Implementasi Admin Dashboard & Fitur CRUD Laravel 7

**Project**: `indracocoffee-v2-laravel-7`  
**Path**: `C:\laragon\www\#indraco\indracocoffee-v2\indracocoffee-v2-laravel-7`  
**File Perencanaan**: `implementation_admin_dashboard_plan.md`  
**Tanggal**: 2026-07-28  

---

## 1. Ringkasan & Tujuan (Overview)

Dokumen ini berisi rencana pengembangan modul **Admin Dashboard & Sistem Manajemen Konten (CMS/CRUD)** untuk aplikasi web **INDRACO Coffee**.

Komponen utama yang akan dibangun:
1. **Desain Halaman Login Admin**: Mengikuti bahasa desain template INDRACO (Rounded UI, Dark/Light Theme toggle, Glassmorphism, Logo INDRACO Est.).
2. **Fitur Otentikasi Admin**: Pengamanan rute `/admin/*` menggunakan Auth Guard & Middleware Laravel.
3. **Admin Dashboard Overview**: Ringkasan statistik (Jumlah Produk, Merek, Kategori, Berita, Pesan Masuk, & Log Aktivitas Terbaru).
4. **Modul Manajemen CRUD (10 Tabel Master)**:
   - **Master Merek** (Merek, Logo, Status)
   - **Master Kategori** (Hierarki Parent/Child, Ikon, Urutan)
   - **Master Collection** (Koleksi Produk per Merek)
   - **Master Type** (Tipe Olahan Produk per Koleksi)
   - **Master Variant** (Karakteristik Rasa, Acidity, Body, Roast, Peta)
   - **Master Produk** (Katalog Lengkap, Multi-Gambar Gallery, Fitur Unggulan, Link Marketplace)
   - **Master Banner** (Management Banner Slider Homepage & Schedule)
   - **Master Kontak** (Melihat & Mengelola Pesan Masuk dari Form Contact Us)
   - **Master Log Aktivitas** (Jejak Audit Aktivitas Pengguna & Sistem)
   - **Master News** (Manajemen Berita & Media Corporate)

---

## 2. Arsitektur Otentikasi & Pengamanan Rute

### A. Alur Otentikasi
- **Rute Login Admin**: `/admin/login` (GUEST middleware).
- **Proses Login**: Memeriksa kredensial email & password, menggenerasi session admin, dan merekam log masuk ke `master_log_aktivitas`.
- **User Default Admin**:
  - Email: `admin@indraco.com`
  - Password: `password` (Melalui `UserSeeder`)

### B. Middleware Rute (`routes/web.php`)
```php
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    });

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // CRUD Resource Routes
        Route::resource('merek', App\Http\Controllers\Admin\MerekController::class);
        Route::resource('kategori', App\Http\Controllers\Admin\KategoriController::class);
        Route::resource('collection', App\Http\Controllers\Admin\CollectionController::class);
        Route::resource('type', App\Http\Controllers\Admin\TypeController::class);
        Route::resource('variant', App\Http\Controllers\Admin\VariantController::class);
        Route::resource('produk', App\Http\Controllers\Admin\ProdukController::class);
        Route::resource('banner', App\Http\Controllers\Admin\BannerController::class);
        Route::resource('kontak', App\Http\Controllers\Admin\KontakController::class)->only(['index', 'show', 'destroy']);
        Route::get('log-aktivitas', [App\Http\Controllers\Admin\LogAktivitasController::class, 'index'])->name('log-aktivitas.index');
        Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    });
});
```

---

## 3. Desain UI Halaman & Layout Admin

### A. Layout Master Admin (`resources/views/layouts/admin.blade.php`)
- **Sidebar Navigation**: Menu grup (Dashboard, Katalog Produk, Konten Web, Pesan & Log).
- **Top Navbar**: Logo Indraco, Profile User Logged-in, Dark Mode Toggle, Button Logout.
- **Content Area**: Container responsif untuk Form & Datatable.
- **Notification Toast/Alert**: Menampilkan pesan sukses / error operasi CRUD (`session('success')`, `session('error')`).

### B. Halaman Login Admin (`resources/views/admin/auth/login.blade.php`)
- Menggunakan styling modern yang serasi dengan desain utama website (glassmorphism card, rounded input, logo `logo-indraco-est.png`, toggle theme dark/light).

---

## 4. Rincian Modul CRUD & Controller

### 1. `Admin\DashboardController`
- Menampilkan widget kartu counter: Total Produk, Total Merek, Total Kategori, Total Pesan Kontak Baru, Total Berita.
- Menampilkan grafik / tabel 10 aktivitas log terbaru dari `master_log_aktivitas`.

### 2. `Admin\MerekController`
- **Daftar**: Tabel merek dengan logo thumbnail, nama, slug, status badge.
- **Tambah/Edit**: Form upload logo, nama merek, slug otomatis, deskripsi bilingual (ID & EN), status active/inactive.
- **Hapus**: Konfirmasi hapus data merek.

### 3. `Admin\KategoriController`
- **Daftar**: Tabel hierarki kategori (Parent & Sub-kategori).
- **Tambah/Edit**: Dropdown parent kategori, nama kategori, ikon path, urutan tampil.

### 4. `Admin\CollectionController`
- **Daftar**: Tabel koleksi per merek.
- **Tambah/Edit**: Select Merek, nama koleksi, slug, status.

### 5. `Admin\TypeController`
- **Daftar**: Tabel tipe olahan (Capsules, Beans, Ground, Drip).
- **Tambah/Edit**: Select Collection, nama tipe, slug.

### 6. `Admin\VariantController`
- **Daftar**: Tabel varian rasa kopi & atribut rasa.
- **Tambah/Edit**: Select Type, rasa, acidity (0-5), body (0-5), roast level, foto peta asal kopi, warna background & teks.

### 7. `Admin\ProdukController`
- **Daftar**: Datatable produk dengan filter per Merek & Kategori, search bar, toggle status & is_unggulan.
- **Tambah/Edit**: Relasi bertingkat (Merek -> Collection -> Type -> Variant), SKU, harga reguler, tipe packing, inner kemasan, upload gambar utama & multi-gallery (JSON array), link marketplace (Shopee, Tokopedia, Lazada, TikTok).

### 8. `Admin\BannerController`
- **Daftar**: Slider list, urutan display (`order_num`), toggle status banner.
- **Tambah/Edit**: Upload gambar banner, title ID/EN, subtitle ID/EN, button text, URL link destination.

### 9. `Admin\KontakController`
- **Daftar**: Tabel daftar pesan masuk dari pengunjung website.
- **Detail**: Modal/halaman baca isi pesan kontak, tanggal kirim, email & nomor telepon pemohon.

### 10. `Admin\NewsController`
- **Daftar**: Tabel daftar berita & pengumuman.
- **Tambah/Edit**: Form input judul ID/EN, tanggal terbit, upload foto header berita, isi konten (Rich text editor / textarea).

### 11. `Admin\LogAktivitasController`
- **Daftar**: Read-only audit log aktivitas (Waktu, Nama User, IP Address, Aktivitas, Model yang Diubah, Data Sebelum & Sesudah).

---

## 5. Tahapan Eksekusi Implementation

### Tahap 1: Persiapan User & Authentication Seeder
- Menambahkan `UserSeeder.php` untuk mengisikan user akun admin default (`admin@indraco.com`).
- Menjalankan `artisan db:seed --class=UserSeeder`.

### Tahap 2: Master Layout & Halaman Login UI
- Membuat `resources/views/layouts/admin.blade.php` & `resources/views/admin/auth/login.blade.php`.
- Mengimplementasikan `App\Http\Controllers\Admin\AuthController.php`.

### Tahap 3: Halaman Dashboard Admin
- Mengimplementasikan `App\Http\Controllers\Admin\DashboardController.php` & `resources/views/admin/dashboard.blade.php`.

### Tahap 4: Pembuatan Modul CRUD (Controllers & Views)
- Mengimplementasikan masing-masing Controller di `app/Http/Controllers/Admin/`.
- Membuat Blade view form & tabel di `resources/views/admin/`.

### Tahap 5: Testing & Verifikasi
- Menguji alur login & logout admin.
- Menguji pengisian form CRUD pada masing-masing tabel master.
- Memastikan aktivitas log otomatis ter-record di database.
