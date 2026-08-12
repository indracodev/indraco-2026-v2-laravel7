<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterProdukTable extends Migration
{
    public function up(): void
    {
        Schema::create('master_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merek_id')->nullable()->constrained('master_merek')->nullOnDelete();
            $table->foreignId('kategori_id')->nullable()->constrained('master_kategori')->nullOnDelete();
            $table->foreignId('collection_id')->nullable()->constrained('master_collection')->nullOnDelete();
            $table->foreignId('type_id')->nullable()->constrained('master_type')->nullOnDelete();
            $table->foreignId('variant_id')->nullable()->constrained('master_variant')->nullOnDelete();
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
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_produk');
    }
}
