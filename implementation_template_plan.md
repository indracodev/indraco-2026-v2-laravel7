# Rencana Implementasi Template HTML ke Aplikasi Web Laravel 7
**Project**: `indracocoffee-v2-laravel-7`  
**Path Project**: `C:\laragon\www\#indraco\indracocoffee-v2\indracocoffee-v2-laravel-7`  
**Sumber Template**: `C:\laragon\www\#indraco\indracocoffee-v2\template`  
**Tanggal**: 2026-07-28  

---

## 1. Ringkasan & Tujuan (Overview)
Dokumen ini berisi panduan teknis dan rencana langkah demi langkah untuk mengintegrasikan template HTML/CSS/JS statis dari folder `template` ke dalam aplikasi web **Laravel 7** (`indracocoffee-v2-laravel-7`).

Tujuan utama integrasi:
1. Memindahkan aset statis (CSS, JS, Fonts, Images) ke direktori `public/`.
2. Mengubah struktur HTML statis yang menggunakan `fetch()` komponen JS menjadi **Blade Components & Layout Engine** Laravel (server-side rendering).
3. Menyediakan arsitektur MVC (Model-View-Controller) & Routing yang rapi dan terstruktur.
4. Menyediakan solusi untuk error runtime versi PHP (memastikan aplikasi berjalan dengan **PHP 7.4.32**).

---

## 2. Solusi Lingkungan Pengembangan (PHP Runtime)

### Isu PHP Version Compatibility
Saat menjalankan `php artisan serve`, sistem default menggunakan PHP 8.2 (`PHP 8.2.29`). Laravel 7 memerlukan versi PHP **>= 7.2.5** dan **< 8.0.0** (PHP 7.4.32 sangat disarankan). Jika dijalankan dengan PHP 8.2, akan terjadi deprecation warning & error pada `Collection.php`.

### Cara Menjalankan Server yang Benar:
1. **Menggunakan binary PHP 7.4.32 langsung di CLI**:
   ```bash
   C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan serve
   ```
2. **Atau Mengubah Versi PHP di Laragon GUI**:
   - Klik kanan pada tray icon Laragon -> `PHP` -> `Version` -> Pilih `php-7.4.32`.
   - Buka terminal baru dari Laragon, lalu jalankan `php artisan serve`.

---

## 3. Strategi Migrasi Aset Statis

Aset dari `C:\laragon\www\#indraco\indracocoffee-v2\template` akan dipindahkan ke folder `public/` aplikasi Laravel:

| Aset Asal (`template/`) | Lokasi Tujuan di Laravel (`public/`) | Keterangan & Penggunaan Helper Blade |
| :--- | :--- | :--- |
| `css/*` | `public/css/*` | `{{ asset('css/main.css') }}` |
| `js/*` | `public/js/*` | `{{ asset('js/main.js') }}` |
| `fonts/*` | `public/fonts/*` | `{{ asset('fonts/myFont.css') }}` |
| `images/*` | `public/images/*` | `{{ asset('images/logo-indraco-est.png') }}` |

---

## 4. Arsitektur Layout & Blade Components

Aplikasi akan menggunakan **Master Layout** utama dan komponen Blade terpisah agar tidak ada duplikasi kode HTML (`DRY - Don't Repeat Yourself`).

### Struktur Folder Blade Views:
```
resources/views/
├── layouts/
│   └── app.blade.php           # Master Layout Utama (HTML shell, head, header, footer, scripts)
├── components/
│   ├── navbar.blade.php        # Header Navigasi & Menu Collapse
│   ├── footer.blade.php        # Footer Halaman
│   ├── modal-search.blade.php   # Modal Dialog Pencarian
│   ├── sosmed.blade.php        # Sidebar / Floating Social Media Links
│   ├── toggle-language.blade.php # Dropdown Bahasa (ID / EN)
│   └── card-product.blade.php  # Reusable Product Card Component
└── pages/
    ├── home.blade.php          # (dari index.html)
    ├── about.blade.php         # (dari about.html)
    ├── businesses.blade.php    # (dari businesses.html)
    ├── products/
    │   ├── index.blade.php     # (dari products.html)
    │   ├── list.blade.php      # (dari products-list.html)
    │   └── detail.blade.php    # (dari products-detail.html)
    ├── news.blade.php          # (dari news.html)
    ├── careers.blade.php       # (dari careers.html)
    ├── downloads.blade.php     # (dari downloads.html)
    ├── contact.blade.php       # (dari contact.html)
    └── store.blade.php         # (dari store.html)
```

### Master Layout (`resources/views/layouts/app.blade.php`)
```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'INDRACO')</title>
    <link rel="shortcut icon" href="{{ asset('images/icon-indraco.ico') }}" type="image/x-icon">
    
    {{-- Core CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/myFont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    @stack('styles')
</head>
<body>
    <a href="#content" class="visually-hidden-focusable">Skip to main content</a>
    
    {{-- Blade Component Header & Modals --}}
    @include('components.navbar')
    @include('components.modal-search')
    @include('components.sosmed')

    <main id="content" tabindex="-1">
        @yield('content')
    </main>

    @include('components.footer')

    {{-- Core JS --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
```

---

## 5. Pemetaan Route & Controller

Semua URL statis `.html` dialihkan menjadi route yang bersih (*Clean URLs*) dengan Controller terstruktur.

### Controller: `app/Http/Controllers/PageController.php`
Mengelola halaman utama & umum:
- `home()` -> `resources/views/pages/home.blade.php`
- `about()` -> `resources/views/pages/about.blade.php`
- `businesses()` -> `resources/views/pages/businesses.blade.php`
- `news()` -> `resources/views/pages/news.blade.php`
- `careers()` -> `resources/views/pages/careers.blade.php`
- `downloads()` -> `resources/views/pages/downloads.blade.php`
- `contact()` -> `resources/views/pages/contact.blade.php`
- `store()` -> `resources/views/pages/store.blade.php`

### Controller: `app/Http/Controllers/ProductController.php`
Mengelola katalog & detail produk:
- `index()` -> `resources/views/pages/products/index.blade.php`
- `list()` -> `resources/views/pages/products/list.blade.php`
- `detail($slug)` -> `resources/views/pages/products/detail.blade.php`

### Definisi Route (`routes/web.php`)
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/businesses', [PageController::class, 'businesses'])->name('businesses');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/list', [ProductController::class, 'list'])->name('list');
    Route::get('/{slug}', [ProductController::class, 'detail'])->name('detail');
});

Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/store', [PageController::class, 'store'])->name('store');
```

---

## 6. Tahapan Eksekusi (Implementation Steps)

### Tahap 1: Salin Aset Statis ke `public/`
Copy folder dari `C:\laragon\www\#indraco\indracocoffee-v2\template\`:
- `css` -> `public/css`
- `js` -> `public/js`
- `fonts` -> `public/fonts`
- `images` -> `public/images`

### Tahap 2: Buat Master Layout & Blade Components
- Buat `resources/views/layouts/app.blade.php`.
- Konversi komponen HTML dari `template/components/` menjadi Blade partials di `resources/views/components/`:
  - `navbar.blade.php`
  - `footer.blade.php`
  - `modal-search.blade.php`
  - `sosmed.blade.php`
  - `toggle-language.blade.php`
  - `card-product.blade.php`
- Sesuaikan tag gambar (`<img src="...">`) dan hyperlink (`<a href="...">`) menggunakan helper `asset()` dan `route()`.

### Tahap 3: Migration Halaman Template (HTML to Blade)
Konversi halaman statis menjadi tampilan Blade yang mengekstend `layouts.app`:
1. `index.html` -> `resources/views/pages/home.blade.php` (tambahkan stylesheet `home-banner.css`, `home-news.css`, `home-social.css`).
2. `about.html` -> `resources/views/pages/about.blade.php` (tambahkan script/css `about-carousel`).
3. `businesses.html` -> `resources/views/pages/businesses.blade.php`.
4. `products.html`, `products-list.html`, `products-detail.html` -> `resources/views/pages/products/`.
5. `news.html`, `careers.html`, `downloads.html`, `contact.html`, `store.html`.

### Tahap 4: Buat Controllers & Routes
- Jalankan artisan command (dengan PHP 7.4):
  ```bash
  C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:controller PageController
  C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:controller ProductController
  ```
- Daftarkan semua method controller & route di `routes/web.php`.

### Tahap 5: Verifikasi & Uji Coba (Testing)
1. Jalankan web server:
   ```bash
   C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan serve
   ```
2. Buka browser di `http://127.0.0.1:8000`.
3. Verifikasi:
   - Apakah semua CSS, JS, dan gambar ter-load tanpa error 404?
   - Apakah navigasi antar halaman berfungsi lancar?
   - Apakah toggle dark mode, search modal, dan carousel berjalan dengan baik?

---

## 7. Penutup & Catatan
Dengan perencanaan ini, integrasi template ke Laravel 7 akan menghasilkan aplikasi yang rapi, cepat, mudah dikembangkan lebih lanjut (misal penambahan database / dynamic CMS), dan bebas dari kendala kompatibilitas PHP.
