# Rencana Implementasi Migrasi & Model Database Laravel 7 (Lengkap)

**Project**: `indracocoffee-v2-laravel-7`  
**Path**: `C:\laragon\www\#indraco\indracocoffee-v2\indracocoffee-v2-laravel-7`  
**Tanggal**: 2026-07-28  

---

## 1. Ringkasan & Tujuan (Overview)

Dokumen ini memuat rancangan lengkap skema migrasi database serta Eloquent Models Laravel 7 untuk **10 tabel master** berikut:

1. **`master_merek`**: Data merek/brand utama (Supresso, BaliCafé, Tugu Buaya, Uang Emas, Rasa Sayang, BROCHOCO, Jaheku, intiRasa, dll).
2. **`master_kategori`**: Hierarki kategori produk (Coffee, Ginger, Chocolate, Coconut Milk, dll).
3. **`master_collection`**: Koleksi/seri dari suatu merek (misal Supresso Executive, Supresso Single Origin).
4. **`master_type`**: Tipe sajian produk (Capsules, Beans, Ground, Drip, Instant, Sachet, Can, dll).
5. **`master_variant`**: Varian detail produk (rasa, acidity, body, roast, ingredient, peta asal kopi, style visual).
6. **`master_produk`**: Katalog produk utama lengkap dengan relasi ke Merek, Kategori, Collection, Type, Variant, deskripsi, gallery JSON, harga, serta link e-commerce.
7. **`master_banners`**: Banner slider halaman utama (multilanguage title, subtitle, button, link, schedule).
8. **`master_kontak`**: Pesan & inquiry formulir Contact Us dari pengunjung.
9. **`master_log_aktivitas`**: Log jejak audit aktivitas user / sistem (User ID, aktivitas, model, data lama, data baru, IP, User Agent).
10. **`master_news`**: Artikel berita, pengumuman, CSR, dan event media (multilanguage judul, content, gambar).

---

## 2. Urutan Eksekusi Migrasi (Order of Migrations)

Untuk menjaga integritas referensi Foreign Key (FK), migrasi akan dibuat secara berurutan:

```
database/migrations/
├── 2026_01_01_000001_create_master_merek_table.php
├── 2026_01_01_000002_create_master_kategori_table.php
├── 2026_01_01_000003_create_master_collection_table.php
├── 2026_01_01_000004_create_master_type_table.php
├── 2026_01_01_000005_create_master_variant_table.php
├── 2026_01_01_000006_create_master_produk_table.php
├── 2026_01_01_000007_create_master_banners_table.php
├── 2026_01_01_000008_create_master_kontak_table.php
├── 2026_01_01_000009_create_master_log_aktivitas_table.php
└── 2026_01_01_000010_create_master_news_table.php
```

---

## 3. Detail Skema Tabel & Struktur Migrasi

### 1. Tabel `master_merek`
```php
Schema::create('master_merek', function (Blueprint $table) {
    $table->id();
    $table->string('nama_merek');
    $table->string('slug')->unique();
    $table->string('logo_path')->nullable();
    $table->text('deskripsi')->nullable();
    $table->text('deskripsi_eng')->nullable();
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->timestamps();
});
```

### 2. Tabel `master_kategori`
```php
Schema::create('master_kategori', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('parent_id')->nullable();
    $table->string('nama_kategori');
    $table->string('slug')->unique();
    $table->string('ikon_path')->nullable();
    $table->integer('urutan')->default(0);
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->timestamps();

    $table->foreign('parent_id')->references('id')->on('master_kategori')->onDelete('set null');
});
```

### 3. Tabel `master_collection`
```php
Schema::create('master_collection', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('merek_id')->nullable();
    $table->string('collection_name');
    $table->string('slug')->unique();
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->timestamps();

    $table->foreign('merek_id')->references('id')->on('master_merek')->onDelete('set null');
});
```

### 4. Tabel `master_type`
```php
Schema::create('master_type', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('collection_id')->nullable();
    $table->string('type_name');
    $table->string('slug')->unique();
    $table->timestamps();

    $table->foreign('collection_id')->references('id')->on('master_collection')->onDelete('set null');
});
```

### 5. Tabel `master_variant`
```php
Schema::create('master_variant', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('type_id')->nullable();
    $table->string('variant_name');
    $table->string('slug')->unique();
    $table->text('description')->nullable();
    $table->string('taste')->nullable();
    $table->decimal('acidity', 5, 2)->nullable();
    $table->decimal('body', 5, 2)->nullable();
    $table->string('roast')->nullable();
    $table->string('ingredient')->nullable();
    $table->string('map_image')->nullable();
    $table->decimal('map_opacity', 5, 2)->nullable();
    $table->string('icon_path')->nullable();
    $table->string('bg_color')->nullable();
    $table->string('text_color')->nullable();
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->integer('sort_order')->nullable()->default(0);
    $table->integer('map_size')->nullable();
    $table->integer('map_top')->nullable();
    $table->integer('map_right')->nullable();
    $table->timestamps();

    $table->foreign('type_id')->references('id')->on('master_type')->onDelete('cascade');
});
```

### 6. Tabel `master_produk`
```php
Schema::create('master_produk', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('merek_id')->nullable();
    $table->unsignedBigInteger('kategori_id')->nullable();
    $table->unsignedBigInteger('collection_id')->nullable();
    $table->unsignedBigInteger('type_id')->nullable();
    $table->unsignedBigInteger('variant_id')->nullable();
    $table->string('nama_produk');
    $table->string('slug')->unique();
    $table->string('sku')->nullable();
    $table->text('deskripsi_singkat')->nullable();
    $table->longText('deskripsi_lengkap')->nullable();
    $table->string('tipe_packing')->nullable();
    $table->string('inner_kemasan')->nullable();
    $table->decimal('harga_reguler', 15, 2)->nullable();
    $table->string('gambar_utama')->nullable();
    $table->longText('gambar_gallery_json')->nullable();
    $table->tinyInteger('is_unggulan')->default(0);
    $table->string('link_shopee')->nullable();
    $table->string('link_web')->nullable();
    $table->string('link_tokopedia')->nullable();
    $table->string('link_lazada')->nullable();
    $table->string('link_tiktok')->nullable();
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->tinyInteger('is_deleted')->default(0);
    $table->timestamps();

    $table->foreign('merek_id')->references('id')->on('master_merek')->onDelete('set null');
    $table->foreign('kategori_id')->references('id')->on('master_kategori')->onDelete('set null');
    $table->foreign('collection_id')->references('id')->on('master_collection')->onDelete('set null');
    $table->foreign('type_id')->references('id')->on('master_type')->onDelete('set null');
    $table->foreign('variant_id')->references('id')->on('master_variant')->onDelete('set null');
});
```

### 7. Tabel `master_banners`
```php
Schema::create('master_banners', function (Blueprint $table) {
    $table->id();
    $table->string('image_path');
    $table->string('title_id')->nullable();
    $table->string('title_en')->nullable();
    $table->string('subtitle_id')->nullable();
    $table->string('subtitle_en')->nullable();
    $table->string('link')->nullable();
    $table->string('button_text_id')->nullable();
    $table->string('button_text_en')->nullable();
    $table->integer('order_num')->default(0);
    $table->tinyInteger('is_active')->default(1);
    $table->string('schedule_days')->nullable();
    $table->timestamps();
});
```

### 8. Tabel `master_kontak`
```php
Schema::create('master_kontak', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('email');
    $table->string('telepon')->nullable();
    $table->string('judul_pesan')->nullable();
    $table->text('pesan');
    $table->timestamp('tanggal_kirim')->useCurrent();
    $table->timestamps();
});
```

### 9. Tabel `master_log_aktivitas`
```php
Schema::create('master_log_aktivitas', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id')->nullable();
    $table->string('aktivitas');
    $table->string('model')->nullable();
    $table->unsignedBigInteger('model_id')->nullable();
    $table->text('data_lama')->nullable();
    $table->text('data_baru')->nullable();
    $table->string('ip_address')->nullable();
    $table->string('user_agent')->nullable();
    $table->string('url')->nullable();
    $table->timestamps();
});
```

### 10. Tabel `master_news`
```php
Schema::create('master_news', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique();
    $table->string('judul');
    $table->string('judul_eng')->nullable();
    $table->string('tanggal')->nullable();
    $table->string('tanggal_eng')->nullable();
    $table->text('content')->nullable();
    $table->text('content_eng')->nullable();
    $table->string('image_path')->nullable();
    $table->timestamps();
});
```

---

## 4. Eloquent Models & Relasi Database

Daftar 10 Model di folder `app/Models/`:

1. **`App\Models\MasterMerek`** (Tabel: `master_merek`)
   - `hasMany(MasterCollection::class, 'merek_id')`
   - `hasMany(MasterProduk::class, 'merek_id')`

2. **`App\Models\MasterKategori`** (Tabel: `master_kategori`)
   - `belongsTo(MasterKategori::class, 'parent_id')`
   - `hasMany(MasterKategori::class, 'parent_id')`
   - `hasMany(MasterProduk::class, 'kategori_id')`

3. **`App\Models\MasterCollection`** (Tabel: `master_collection`)
   - `belongsTo(MasterMerek::class, 'merek_id')`
   - `hasMany(MasterType::class, 'collection_id')`
   - `hasMany(MasterProduk::class, 'collection_id')`

4. **`App\Models\MasterType`** (Tabel: `master_type`)
   - `belongsTo(MasterCollection::class, 'collection_id')`
   - `hasMany(MasterVariant::class, 'type_id')`
   - `hasMany(MasterProduk::class, 'type_id')`

5. **`App\Models\MasterVariant`** (Tabel: `master_variant`)
   - `belongsTo(MasterType::class, 'type_id')`
   - `hasMany(MasterProduk::class, 'variant_id')`

6. **`App\Models\MasterProduk`** (Tabel: `master_produk`)
   - `belongsTo(MasterMerek::class, 'merek_id')`
   - `belongsTo(MasterKategori::class, 'kategori_id')`
   - `belongsTo(MasterCollection::class, 'collection_id')`
   - `belongsTo(MasterType::class, 'type_id')`
   - `belongsTo(MasterVariant::class, 'variant_id')`

7. **`App\Models\MasterBanner`** (Tabel: `master_banners`)
8. **`App\Models\MasterKontak`** (Tabel: `master_kontak`)
9. **`App\Models\MasterLogAktivitas`** (Tabel: `master_log_aktivitas`)
10. **`App\Models\MasterNews`** (Tabel: `master_news`)

---

## 5. Seeders (Data Awal Merek, Kategori, Banners, & News)

Dibuat `MasterSeeder` / `MasterMerekSeeder` untuk mengisikan data awal merek, banner, dan berita statis yang telah siap digunakan oleh frontend Blade views.

---

## 6. Tahapan Eksekusi (Steps to Execute)

### Langkah 1: Buat File Migrasi Berurutan
```bash
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_merek_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_kategori_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_collection_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_type_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_variant_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_produk_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_banners_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_kontak_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_log_aktivitas_table
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan make:migration create_master_news_table
```

### Langkah 2: Isikan Struktur Skema Kolom & Foreign Keys
Mengisi masing-masing file migrasi sesuai skema di atas.

### Langkah 3: Buat 10 Eloquent Model & Fillable
Buat 10 file Model di folder `app/Models/` beserta hubungan relasi Eloquent-nya.

### Langkah 4: Eksekusi Migrasi Database
```bash
C:\laragon\bin\php\php-7.4.32-Win32-vc15-x64\php.exe artisan migrate
```
