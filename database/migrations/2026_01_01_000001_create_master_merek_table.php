<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('master_merek');
    }
};
