# Rencana Implementasi Modul Master News & Media (Laravel 10)

**Project Target**: `indracocoffee-v2-laravel-10`  
**Path Project Workspace**: `C:\laragon\www\#indraco\indracocoffee-v2\indracocoffee-v2-laravel-10`  
**File Perencanaan**: `implementation_news_plan.md`  
**Versi PHP Environment**: `PHP 8.2.29`  
**Versi Framework Target**: `Laravel 10.x`  
**Tanggal Perencanaan**: 2026-07-31  

---

## 1. Ringkasan & Tujuan (Overview)

Dokumen ini merupakan **Master Blueprint & Rencana Implementasi Komprehensif Modul Master News & Media** pada aplikasi **INDRACO Coffee v2** berbasis **Laravel 10** dan **PHP 8.2**.

Modul News bertanggung jawab mengelola seluruh rilis berita korporat, liputan media, CSR, dan pengumuman produk INDRACO. Rencana ini melengkapi dan menyempurnakan implementasi yang sudah ada di `indracocoffee-v2-laravel-10` agar memenuhi standar fungsionalitas berikut:
1. **Model & Database Robustness**: Penggunaan Eloquent Model `MasterNews` lengkap dengan accessor bilingual (ID/EN), pembentukan *slug* otomatis, penanganan tanggal publikasi, dan file URL helper.
2. **Complete Admin CRUD & Audit Logging**: Menyediakan fitur Tambah, Edit, Hapus, Detail Preview, serta pencatatan audit trail otomatis di `master_log_aktivitas`.
3. **Advanced Excel Data Tools**: Impor data berita massal (`NewsImport`) dan unduh file template Excel (`NewsTemplateExport`) via `maatwebsite/excel`.
4. **Mobile Responsive Admin UX**: Tampilan Hybrid Dual Layout (Desktop Table `≥ 768px` vs Mobile Card List `< 768px`) dan integrasi dengan Admin Bottom Nav.
5. **Public Website Integration**: Halaman daftar berita (`/news`) dengan pagination dan halaman detail berita (`/news/{slug}`) yang mendukung layout artikel berita modern, SEO-friendly, dan bilingual.

---

## 2. Spesifikasi Data & Eloquent Model (`app/Models/MasterNews.php`)

### Skema Tabel `master_news`
```sql
CREATE TABLE `master_news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL UNIQUE,
  `judul` varchar(255) NOT NULL,
  `judul_eng` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `tanggal_eng` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `content_eng` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
```

### Peningkatan Eloquent Model (`App\Models\MasterNews`)
- **Mass Assignment**: `$fillable` mencakup `['slug', 'judul', 'judul_eng', 'tanggal', 'tanggal_eng', 'content', 'content_eng', 'image_path']`.
- **Boot Method / Sluggable**: Generator slug otomatis saat pembuatan/perubahan berita jika slug tidak diisi manual.
- **Accessor Multilingual**: 
  - `getLocalizedJudulAttribute()`: Mengembalikan `judul_eng` jika locale = 'en' dan ada nilainya, atau fallback ke `judul`.
  - `getLocalizedContentAttribute()`: Mengembalikan `content_eng` jika locale = 'en' dan ada nilainya, atau fallback ke `content`.
  - `getFormattedDateAttribute()`: Format tanggal siap tampil (misal: "15 Agust 2026").
  - `getImageUrlAttribute()`: Mengembalikan URL gambar lengkap atau gambar default jika kosong.

---

## 3. Arsitektur Backend Controller (`Admin\NewsController.php` & `PageController.php`)

### A. Admin News Controller (`app/Http/Controllers/Admin/NewsController.php`)
Menyediakan aksi CRUD lengkap:
1. `index(Request $request)`: Filter & search berdasarkan `judul` atau `content`, pagination `withQueryString()`.
2. `create()`: Menampilkan form tambah berita (atau modal create).
3. `store(Request $request)`:
   - Validasi input (`judul` required, `image` image|mimes:jpeg,png,jpg,webp|max:2048, `slug` unique:master_news,slug).
   - Penanganan upload gambar ke `public/images/uploads/news/`.
   - Penyimpanan ke DB & pencatatan log di `master_log_aktivitas` (`aktivitas = 'Tambah Berita'`).
4. `edit(MasterNews $news)`: Menampilkan form edit / return JSON untuk modal edit.
5. `update(Request $request, MasterNews $news)`:
   - Validasi update (`slug` unique ignore current id).
   - Pengantian file gambar (hapus file lama jika ada gambar baru yang diunggah).
   - Update DB & pencatatan log (`aktivitas = 'Update Berita'`).
6. `destroy(MasterNews $news)`:
   - Hapus file gambar dari disk.
   - Hapus record DB & pencatatan log (`aktivitas = 'Hapus Berita'`).
7. `import(Request $request)`: Mengolah file `.xlsx`/`.csv` via `NewsImport`.
8. `downloadTemplate()`: Mengunduh template Excel via `NewsTemplateExport`.

### B. Public Website Controller (`app/Http/Controllers/PageController.php`)
1. `news(Request $request)`: Menampilkan daftar berita publik (`resources/views/pages/news.blade.php`), urut terbaru (`latest()`), 6 data per halaman.
2. `newsDetail($slug)`: Menampilkan detail artikel berita (`resources/views/pages/news-detail.blade.php`) berdasarkan `slug`. Mengembalikan 404 jika berita tidak ditemukan, serta menyajikan 3 berita terkait (*related news*).

---

## 4. Struktur View & UI/UX Design

### A. Admin Dashboard View (`resources/views/admin/news/`)
1. **`index.blade.php`**:
   - Header Banner dengan tombol: Download Template Excel, Import Excel, dan Tambah Berita Baru.
   - Search bar terintegrasi query URL (`request('search')`).
   - **Desktop Table View (`≥ 768px`)**:
     - Kolom: Thumbnail Gambar, Judul Berita, Tanggal Publikasi, Slug, dan Aksi (Edit, Hapus, Detail).
   - **Mobile Card View (`< 768px`)**:
     - Layout card ringkas dengan thumbnail, judul, tanggal, dan tombol aksi touch-friendly.
   - **Modal Form Tambah & Modal Form Edit**:
     - Input field untuk Bahasa Indonesia & Bahasa English (`judul`, `judul_eng`, `tanggal`, `tanggal_eng`, `content`, `content_eng`).
     - Input upload file gambar dengan preview.
   - **Modal Import Excel**:
     - Form upload file `.xlsx`, `.xls`, atau `.csv` yang langsung mengarah ke `route('admin.news.import')`.

2. **`create.blade.php` & `edit.blade.php`** (Opsional/Pendukung jika menggunakan halaman khusus selain modal):
   - Form full-page dengan Tab Navigasi (Bahasa Indonesia / English) untuk kemudahan pengisian konten berita bilingual yang panjang.

### B. Public Website Views (`resources/views/pages/`)
1. **`news.blade.php` (Daftar Berita)**:
   - Hero section banner: "Corporate News & Events".
   - Grid Card Berita Responsive (3 kolom desktop, 1 kolom mobile).
   - Thumbnail gambar dengan efek hover zoom.
   - Badge tanggal & ringkasan isi berita (`Str::limit`).
   - Pagination custom INDRACO.

2. **`news-detail.blade.php` (Detail Artikel Berita)**:
   - Breadcrumb Navigasi: Home > News > [Judul Berita].
   - Header Artikel: Judul Berita, Tanggal Publikasi, Share Buttons (Facebook, Twitter, LinkedIn, WhatsApp).
   - Featured Image ukuran besar dengan kustom styling shadow & rounded.
   - Body Content: Render isi berita (mendukung format HTML/Paragraph).
   - Section Sidebar / Bottom: "Berita Terkait" (3 artikel terbaru lainnya).

---

## 5. Fitur Alat Data Excel (`app/Imports/` & `app/Exports/`)

### A. `NewsImport.php` (`App\Imports\NewsImport`)
- Mengimplementasikan `ToModel`, `WithHeadingRow`, `WithValidation`.
- Menggunakan `updateOrCreate` berbasis `slug` atau `judul` untuk menghindari duplikasi data.
- Mengunggah / memetakan path gambar jika disertakan.

### B. `NewsTemplateExport.php` (`App\Exports\NewsTemplateExport`)
- Menggenerasi file Excel `.xlsx` dengan header:
  `['judul', 'judul_eng', 'slug', 'tanggal', 'tanggal_eng', 'content', 'content_eng', 'image_path']`.
- Disertai contoh baris data dummy untuk panduan pengguna.

---

## 6. Seeders Data Awal (`database/seeders/MasterNewsSeeder.php`)

Menyediakan data berita awal yang realistis untuk merek-merek INDRACO (Supresso, Balicreamer, Brochoc, Supresso Coffee Maker, dll.):
1. **Berita 1**: "Peluncuran Supresso Speciality Series: Cita Rasa Kopi Nusantara untuk Dunia"
2. **Berita 2**: "Komitmen INDRACO Dalam Program Keberlanjutan Petani Kopi Indonesia"
3. **Berita 3**: "Balicreamer Hadirkan Formulasi Baru Krimer Nabati Premium"

Seeder dipanggil secara otomatis melalui `DatabaseSeeder.php`.

---

## 7. Rencana Tahapan Eksekusi (Implementation Steps)

```
[Tahap 1: Backend Model & Seeder]
 ├── Perbarui app/Models/MasterNews.php (Sluggable, Accessors)
 ├── Buat database/seeders/MasterNewsSeeder.php
 └── Daftarkan seeder di DatabaseSeeder.php

[Tahap 2: Excel Import & Export Tools]
 ├── Buat app/Imports/NewsImport.php
 └── Buat app/Exports/NewsTemplateExport.php

[Tahap 3: Controller & Routes Admin]
 ├── Lengkapi App\Http\Controllers\Admin\NewsController.php (CRUD, Upload, Log, Import)
 └── Tambahkan rute rincian di routes/web.php (news.edit, news.update, news.import, news.template)

[Tahap 4: Admin Blade Views & Mobile Responsive]
 ├── Perbarui resources/views/admin/news/index.blade.php (Modal Edit, Form Bilingual, Import Excel)
 └── Buat view edit/create pendukung jika diperlukan

[Tahap 5: Public Website Frontend Integration]
 ├── Perbarui App\Http\Controllers\PageController.php (metode news & newsDetail)
 ├── Tambahkan rute public /news/{slug} di routes/web.php
 ├── Perbarui resources/views/pages/news.blade.php
 └── Buat resources/views/pages/news-detail.blade.php

[Tahap 6: Verification & Testing]
 └── Jalankan pengujian CLI & manual browser
```

---

## 8. Rencana Verifikasi & Pengujian (Verification Plan)

### A. Pengujian CLI & Framework
1. **Verifikasi Sintaks & Rute**:
   ```bash
   php artisan route:list --name=news
   ```
2. **Verifikasi Migration & Database Seeding**:
   ```bash
   php artisan migrate:fresh --seed
   ```

### B. Pengujian Manual Panel Admin
1. **CRUD Berita**:
   - Buka `/admin/news`.
   - Tambah berita baru dengan gambar featured. Pastikan gambar tersimpan di `public/images/uploads/news/`.
   - Edit berita (ubah judul & gambar), pastikan gambar lama terhapus dari server.
   - Hapus berita, pastikan record & gambar terhapus.
2. **Audit Log**:
   - Buka `/admin/log-aktivitas`, pastikan aktivitas Tambah, Edit, dan Hapus Berita tercatat dengan rinci.
3. **Excel Tools**:
   - Klik tombol "Download Template Excel", pastikan file `.xlsx` terunduh.
   - Uji import berita via modal Import Excel.
4. **Tampilan Mobile Adaptif**:
   - Buka DevTools (`width < 768px`), pastikan tabel admin berubah menjadi Card List yang rapi.

### C. Pengujian Halaman Public Website
1. **Daftar Berita (`/news`)**:
   - Buka `/news`, pastikan berita tampil dalam bentuk grid card.
   - Uji navigasi pagination.
2. **Detail Berita (`/news/{slug}`)**:
   - Klik salah satu berita, pastikan berpindah ke rute `/news/{slug}`.
   - Pastikan konten judul, tanggal, gambar hero, dan isi berita tampil sempurna.
   - Uji penanganan slug tidak valid (harus menampilkan halaman 404).

---

## 9. Penutup

Dengan menyelesaikan implementasi **Modul Master News & Media** sesuai rencana ini, fitur berita pada **INDRACO Coffee v2** akan berjalan optimal, mendukung pengelolaan konten bilingual, aman, responsif pada perangkat mobile, serta siap digunakan secara profesional.
