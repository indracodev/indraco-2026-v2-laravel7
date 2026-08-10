# Rencana Implementasi Layout Mobile Admin, Search & Filter, dan Fitur Import Excel

**Project**: `indracocoffee-v2-laravel-7`  
**Path**: `C:\laragon\www\#indraco\indracocoffee-v2\indracocoffee-v2-laravel-7`  
**File Perencanaan**: `implementation_mobile_layout_plan.md`  
**Tanggal**: 2026-07-28  

---

## 1. Ringkasan & Tujuan (Overview)

Dokumen ini berisi rencana pengembangan dan penyempurnaan Admin Panel **INDRACO Coffee** untuk meningkatkan kenyamanan penggunaan pada perangkat seluler (Mobile Responsive UI/UX) dan efisiensi manajemen data.

Fitur utama yang akan diimplementasikan:
1. **Layout Adaptif Mobile**:
   - Offcanvas Drawer Sidebar pada layar smartphone/tablet.
   - **Bottom Navigation Bar** yang selalu menempel (sticky/fixed) di bagian bawah layar HP untuk akses cepat menu utama.
2. **Transformasi Tabel ke Card List Mobile**:
   - Pada layar Desktop (`≥ 768px`): Menampilkan tabel HTML standar.
   - Pada layar Mobile (`< 768px`): Otomatis beralih ke tampilan **Card List** yang responsif, dilengkapi thumbnail, badge status, dan tombol aksi (Edit, Hapus, Detail).
3. **Pencarian & Filter Terintegrasi di Setiap Menu**:
   - Komponen Search Bar & Filter Dropdown pada seluruh 10 halaman master data (Merek, Kategori, Collection, Type, Variant, Produk, Banner, Kontak, Log Aktivitas, News).
   - Dukungan query string URL (misal: `?search=kopi&status=active&merek_id=1`).
4. **Fitur Import Excel**:
   - Integrasi library `maatwebsite/excel` (atau Parser CSV/XLSX PHP 7.4) untuk impor data massal.
   - Tombol **Import Excel** & Modal Upload File (`.xlsx`, `.xls`, `.csv`).
   - Tombol **Download Template Excel** agar format kolom sesuai dengan struktur database.
   - Proses impor untuk master data utama (Produk, Merek, Kategori, Variant).

---

## 2. Rincian Fitur & Desain Layout Mobile

### A. Mobile Bottom Navigation Bar (`resources/views/components/admin-bottom-nav.blade.php`)
- Posisi: `fixed-bottom` (hanya tampil pada layar `< 992px`).
- Ikon & Navigasi:
  1. **Dashboard** (`/admin/dashboard`)
  2. **Katalog Produk** (`/admin/produk`)
  3. **Master Data** (Offcanvas Trigger / Modal Quick Links)
  4. **Pesan Kontak** (`/admin/kontak`)
  5. **Profile / Logout**

### B. Transformasi Tabel ke Card List Mobile
- Menggunakan pendekatan hybrid Bootstrap 5 utilities (`d-none d-md-block` untuk Table, `d-block d-md-none` untuk Card List).
- **Struktur Item Card List Mobile**:
  - Thumbnail gambar (apabila ada logo/foto produk).
  - Judul & Sub-informasi (SKU / Merek / Kategori).
  - Status Badge (Active/Inactive) & Status Unggulan.
  - Tombol aksi full-width / icon bar di bagian bawah card.

### C. Komponen Search & Filter per Menu List
- **Input Search**: realtime / submit form dengan keyword `search`.
- **Dropdown Filter**: Filter berdasarkan `status`, `merek_id`, `kategori_id`, atau urutan `sort_by`.
- **Tombol Reset Filter**: Mengembalikan daftar ke tampilan default.

---

## 3. Fitur Import Excel Data Massal

### A. Alur Kerja Impor Excel
1. User menekan tombol **Import Excel** di halaman master (misal: Master Produk).
2. Terbuka Modal Upload dengan pilihan:
   - Tombol **Download Template (.xlsx)**.
   - Form Upload Input file `.xlsx` / `.csv`.
3. Controller memproses file melalui Class Import (misal: `App\Imports\ProdukImport`):
   - Validasi data per baris.
   - Menggunakan `updateOrCreate` untuk mencegah duplikasi SKU / Slug.
   - Mencatat log aktivitas impor di `master_log_aktivitas`.
4. Sistem memberikan notifikasi toast sukses (misal: *"Berhasil mengimpor 25 data produk."*).

---

## 4. Perubahan Berdasarkan Komponen & File

### 1. [`layouts/admin.blade.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/resources/views/layouts/admin.blade.php)
- Menambahkan styling responsif mobile bottom nav.
- Menambahkan Offcanvas drawer sidebar untuk layar kecil.

### 2. [`resources/views/components/admin-bottom-nav.blade.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/resources/views/components/admin-bottom-nav.blade.php) **[NEW]**
- Partial view untuk bottom navigation bar mobile.

### 3. Controller Admin (Search & Filter Query)
- [`Admin\MerekController.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/app/Http/Controllers/Admin/MerekController.php): Menambahkan pencarian `nama_merek` & filter `status`.
- [`Admin\KategoriController.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/app/Http/Controllers/Admin/KategoriController.php): Menambahkan pencarian & filter `parent_id`.
- [`Admin\ProdukController.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/app/Http/Controllers/Admin/ProdukController.php): Menambahkan pencarian `nama_produk` / `sku`, filter `merek_id`, `kategori_id`, `status`.
- [`Admin\NewsController.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/app/Http/Controllers/Admin/NewsController.php): Menambahkan pencarian `judul`.
- [`Admin\KontakController.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/app/Http/Controllers/Admin/KontakController.php): Menambahkan pencarian `nama` / `email` / `pesan`.

### 4. Excel Import Logic
- Package: `maatwebsite/excel` (versi 3.1 kompatibel Laravel 7 / PHP 7.4).
- [`app/Imports/ProdukImport.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/app/Imports/ProdukImport.php) **[NEW]**
- [`app/Imports/MerekImport.php`](file:///C:/laragon/www/%23indraco/indracocoffee-v2/indracocoffee-v2-laravel-7/app/Imports/MerekImport.php) **[NEW]**
- Penambahan metode `import(Request $request)` dan `downloadTemplate()` pada Controller terkait.

---

## 5. Rencana Verifikasi Pengujian

1. **Pengujian Tampilan Mobile**:
   - Membuka halaman admin pada viewport smartphone (misal: width `< 576px` & `< 768px`).
   - Verifikasi bahwa tabel otomatis berubah menjadi Card List.
   - Memastikan Bottom Navigation Bar tampil sempurna di bagian bawah dan mudah di-tap.
2. **Pengujian Search & Filter**:
   - Memasukkan kata kunci pencarian dan memilih opsi filter pada masing-masing halaman master.
   - Memastikan hasil pencarian dan navigasi paginasi tetap mempertahankan parameter filter URL.
3. **Pengujian Import Excel**:
   - Mengunduh template file Excel.
   - Mengisi data uji coba dan mengunggah kembali melalui modal Import Excel.
   - Memastikan data berhasil masuk ke database dan tidak menimbulkan error.
