<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/businesses', [PageController::class, 'businesses'])->name('businesses');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/list', [ProductController::class, 'list'])->name('list');
    Route::get('/{slug}', [ProductController::class, 'detail'])->name('detail');
});

Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{slug}', [PageController::class, 'newsDetail'])->name('news.detail');
Route::get('/csr', [PageController::class, 'csr'])->name('csr');

Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'storeContact'])->name('contact.store');
Route::get('/store', [PageController::class, 'store'])->name('store');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [PageController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/data-protection', [PageController::class, 'dataProtection'])->name('data-protection');
Route::get('/help', [PageController::class, 'help'])->name('help');

/*
|--------------------------------------------------------------------------
| Admin Portal Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [Admin\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.post');
    });

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/realtime', [Admin\DashboardController::class, 'realtimeApi'])->name('dashboard.realtime');

        // Master Data CRUD Resources
        Route::resource('merek', Admin\MerekController::class);
        Route::resource('kategori', Admin\KategoriController::class);
        Route::resource('collection', Admin\CollectionController::class);
        Route::resource('type', Admin\TypeController::class);
        Route::resource('variant', Admin\VariantController::class);
        Route::resource('produk', Admin\ProdukController::class);
        Route::resource('banner', Admin\BannerController::class);
        Route::patch('banner/{banner}/toggle', [Admin\BannerController::class, 'toggle'])->name('banner.toggle');
        Route::patch('banner/{banner}/reorder', [Admin\BannerController::class, 'reorder'])->name('banner.reorder');
        Route::resource('kontak', Admin\KontakController::class)->only(['index', 'show', 'destroy']);
        Route::get('log-aktivitas', [Admin\LogAktivitasController::class, 'index'])->name('log-aktivitas.index');
        Route::resource('news', Admin\NewsController::class);
        Route::resource('download', Admin\DownloadController::class);
        Route::patch('download/{download}/toggle', [Admin\DownloadController::class, 'toggle'])->name('download.toggle');

        // Advanced Data Tools (Excel Import / Export & Photo Upload)
        Route::post('news/import', [Admin\NewsController::class, 'import'])->name('news.import');
        Route::get('news/template-excel', [Admin\NewsController::class, 'downloadTemplate'])->name('news.template');
        Route::post('produk/{produk}/update-foto', [Admin\ProdukController::class, 'updateFoto'])->name('produk.update-foto');
        Route::post('produk/import', [Admin\ProdukController::class, 'import'])->name('produk.import');
        Route::get('produk/template-excel', [Admin\ProdukController::class, 'downloadTemplate'])->name('produk.template');
        Route::post('merek/{merek}/update-logo', [Admin\MerekController::class, 'updateLogo'])->name('merek.update-logo');
        Route::post('merek/import', [Admin\MerekController::class, 'import'])->name('merek.import');
        Route::post('kategori/{kategori}/update-ikon', [Admin\KategoriController::class, 'updateIkon'])->name('kategori.update-ikon');

        // Setting Routes
        Route::get('setting', [Admin\SettingController::class, 'index'])->name('setting.index');
        Route::post('setting/logo', [Admin\SettingController::class, 'updateLogo'])->name('setting.update-logo');
        Route::post('setting/logo/reset', [Admin\SettingController::class, 'resetLogo'])->name('setting.reset-logo');
        Route::post('setting/footer-logo', [Admin\SettingController::class, 'updateFooterLogo'])->name('setting.update-footer-logo');
        Route::post('setting/footer-logo/reset', [Admin\SettingController::class, 'resetFooterLogo'])->name('setting.reset-footer-logo');
        Route::post('setting/sosmed', [Admin\SettingController::class, 'updateSosmed'])->name('setting.update-sosmed');
        Route::post('setting/page-content', [Admin\SettingController::class, 'updatePageContent'])->name('setting.update-page-content');
        Route::post('setting/theme-color', [Admin\SettingController::class, 'updateThemeColor'])->name('setting.update-theme-color');
        Route::post('setting/theme-color/reset', [Admin\SettingController::class, 'resetThemeColor'])->name('setting.reset-theme-color');
    });
});
