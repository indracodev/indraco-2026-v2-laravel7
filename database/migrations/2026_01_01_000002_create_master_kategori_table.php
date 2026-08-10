<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('master_kategori')->nullOnDelete();
            $table->string('nama_kategori');
            $table->string('slug')->unique();
            $table->string('ikon_path')->nullable();
            $table->integer('urutan')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_kategori');
    }
};
