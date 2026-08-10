# Dokumentasi Integrasi & Persamaan Fitur (Laravel 7 & Laravel 10)
**Nama Project**: INDRACO Coffee v2 (Multi-Framework Synchronization)  
**Lokasi Repository**: 
- Laravel 7: `C:\laragon\www\#Project2026\indracocoffee-v2-laravel-7`
- Laravel 10: `C:\laragon\www\#Project2026\indracocoffee-v2-laravel-10`  
**Status Sinkronisasi**: 100% Identik secara Fitur & Struktur Data (Paritas Fitur Penuh)

---

## 1. Pendahuluan

Dokumen ini memuat skenario persamaan fitur, arsitektur data, alur bisnis, serta petunjuk integrasi teknis antara **INDRACO Coffee v2 versi Laravel 7** dan **Laravel 10**. 

Meskipun berjalan pada dua versi framework Laravel yang berbeda (L7 untuk sistem legacy/kompatibilitas PHP 7.4 dan L10 untuk sistem modern PHP 8.1+), kedua codebase telah diselaraskan sehingga **seluruh fitur publik, manajemen admin backend, skema database, API endpoint, dan sistem analitik bekerja 100% identik**.

---

## 2. Matriks Persamaan Fitur (Feature Parity Matrix)

| Modul Fitur | Deskripsi Layanan / Operasional | Status L7 | Status L10 | Hasil Integrasi |
|---|---|:---:|:---:|---|
| **Public Landing Page** | Banner Carousel, Core Values, Brand Section, Featured Products | ✅ 100% | ✅ 100% | Tampilan & UI Components Identik |
| **Katalog Produk & Brand** | Filter Merek (Supresso, Balicof, dll), Kategori, Collection, Type, & Variant | ✅ 100% | ✅ 100% | Skema DB `master_produk`, `master_merek`, dll. 100% Sama |
| **Pencarian Produk & Modal** | Live Search & Filter Produk secara Real-time | ✅ 100% | ✅ 100% | AJAX Endpoint & Response JSON Identik |
| **Multilingual (ID / EN)** | Beralih Bahasa (Bahasa Indonesia & English) secara Dinamis | ✅ 100% | ✅ 100% | Menggunakan `session('locale')` & Kolom Multibahasa (`_eng`) |
| **Portal Berita (News & Articles)** | Berita Utama, Detail Artikel, Pagination, & Related News | ✅ 100% | ✅ 100% | URL Slug & Model `MasterNews` Identik |
| **Import / Export News** | Download Template & Upload Excel Berita via Maatwebsite Excel | ✅ 100% | ✅ 100% | Class `NewsTemplateExport` & `NewsImport` Tersedia di Kedua Version |
| **Downloads Center** | Unduh Catalog, Brochure, & Dokumen Perusahaan | ✅ 100% | ✅ 100% | Model `MasterDownload` & Controller Identik |
| **Halaman Kontak & CSR** | Form Kontak Us, CSR Info, Careers, Business Units, Help | ✅ 100% | ✅ 100% | Controller `PageController` 100% Sama |
| **Admin Control Panel** | Authentication Login, Management CRUD (Merek, Kategori, Produk, Banners, News, Settings) | ✅ 100% | ✅ 100% | Layout Admin, Sidebar, Topbar, & Routes Identik |
| **Statistik & Log Kunjungan** | Pelacakan Kunjungan Pengunjung Publik (Visitor Analytics) | ✅ 100% | ✅ 100% | Middleware `TrackPageVisits` & Model `MasterLogKunjungan` Aktif |
| **Log Aktivitas Admin** | Audit Trail / Catatan Setiap Tindakan Admin (Create, Update, Delete) | ✅ 100% | ✅ 100% | Model `MasterLogAktivitas` & Controller Admin |

---

## 3. Skenario Integrasi & Persamaan Arsitektur Teknis

### A. Skema Database (Database Migrations)
Kedua versi memuat 13 tabel utama yang 100% identik:
1. `master_merek` – Mengelola brand produk (Supresso, Balicof, UCafe, UTea, UChoco).
2. `master_kategori` – Kategori kopi (Whole Bean, Ground, Capsule, Instant, Mix).
3. `master_collection` – Koleksi spesial produk.
4. `master_type` – Tipe produk (Arabica, Robusta, Blend).
5. `master_variant` – Varian spesifik produk.
6. `master_produk` – Master data seluruh produk kopi dan aksesoris.
7. `master_banners` – Slideshow banner promo & header landing page.
8. `master_kontak` – Pesan & inquiry dari formulir kontak.
9. `master_log_aktivitas` – Catatan aktivitas user/admin.
10. `master_news` – Artikel berita & pengumuman perusahaan.
11. `master_log_kunjungan` – Pelacakan analitik pengunjung (URL, IP, Device, User Agent).
12. `master_settings` – Pengaturan situs (Title, Logo, Contact Info, Meta).
13. `master_downloads` – Master file brosur & katalog yang dapat diunduh.

---

### B. Routing System & Controller Layer
- **Routes (`routes/web.php`)**: Memiliki nama route, HTTP Method, dan URI prefix yang sama persis (misal: `/admin/dashboard`, `/products/{slug}`, `/news/{slug}`).
- **Controllers (`app/Http/Controllers/Admin/*`)**:
  - `AuthController.php`
  - `BannerController.php`
  - `CollectionController.php`
  - `DashboardController.php`
  - `DownloadController.php`
  - `KategoriController.php`
  - `KontakController.php`
  - `LogAktivitasController.php`
  - `MerekController.php`
  - `NewsController.php`
  - `ProdukController.php`
  - `SettingController.php`
  - `TypeController.php`
  - `VariantController.php`
- **Public Controllers**: `PageController.php`, `ProductController.php`.

---

### C. Middleware Analytics (`TrackPageVisits`)
Sistem perekaman analitik pengunjung telah diselaraskan pada file:
- `app/Http/Middleware/TrackPageVisits.php`
- Didaftarkan pada grup `web` di `app/Http/Kernel.php`.
- **Mekanisme**: Setiap kali pengunjung membuka halaman publik (Home, Products, About, News, Contact, dll.), middleware secara otomatis mencatat nama halaman, URL, IP address, user agent, dan tipe perangkat (Desktop/Mobile/Tablet) ke tabel `master_log_kunjungan`.

---

### D. Sistem Import & Export Excel Berita
Tersedia paket integrasi Maatwebsite Excel di kedua versi:
- **`App\Exports\NewsTemplateExport`**: Menghasilkan file template Excel untuk pengisian data berita secara massal.
- **`App\Imports\NewsImport`**: Memproses pembacaan file Excel dan secara otomatis melakukan `updateOrCreate` pada tabel `master_news`.

---

## 4. Penanganan Kompatibilitas Versi Framework (L7 vs L10)

| Komponen | Laravel 7 (PHP 7.4/8.0) | Laravel 10 (PHP 8.1+) | Catatan Penyelarasan |
|---|---|---|---|
| **Build Tool / Asset Bundler** | Webpack Mix (`webpack.mix.js`) | Vite (`vite.config.js`) | Output file compiled CSS & JS diletakkan di folder `public/` dengan nama & struktur yang sama |
| **Model Namespaces** | `App\Models\*` | `App\Models\*` | Di L7 diselaraskan di folder `app/Models` agar sejalan dengan L10 |
| **String Helpers** | `Illuminate\Support\Str::startsWith()` | `Str::startsWith()` / `str_starts_with()` | Digunakan Helper `Str` agar kompatibel penuh di PHP 7.4 & PHP 8.1+ |
| **Factory Trait** | Model standar L7 | `use HasFactory;` di L10 | Logika bisnis & atribut model 100% identik |

---

## 5. Langkah-Langkah Verifikasi Persamaan Fitur

Untuk memastikan kedua project berjalan dengan hasil yang sama:

1. **Jalankan Database Migration & Seeder**:
   ```bash
   php artisan migrate:fresh --seed
   ```
2. **Uji Coba Halaman Publik**:
   Buka Landing Page, Katalog Produk, Filter Merek, Beralih Bahasa (ID/EN), Halaman News, dan Contact Us.
3. **Uji Coba Admin Panel**:
   Login ke `/admin/login`, lakukan operasi Tambah/Edit/Hapus pada Katalog Produk & Berita, serta coba fitur **Import / Export News**.
4. **Verifikasi Perekaman Analytics**:
   Cek tabel `master_log_kunjungan` di database untuk memastikan log kunjungan tercatat saat menavigasi halaman publik.

---
*Dokumen ini dibuat sebagai panduan resmi sinkronisasi & persamaan fitur antara Laravel 7 dan Laravel 10.*
