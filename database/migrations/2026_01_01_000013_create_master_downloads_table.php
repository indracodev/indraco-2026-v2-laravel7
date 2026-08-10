<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_downloads', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('judul_eng')->nullable();
            $table->string('kategori')->default('Catalog & Brochure');
            $table->text('deskripsi')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_size')->nullable();
            $table->integer('order_num')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_downloads');
    }
};
