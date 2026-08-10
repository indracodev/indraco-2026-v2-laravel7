<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_log_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_halaman');
            $table->string('url');
            $table->string('method', 10)->default('GET');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('device_type', 20)->default('Desktop');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_log_kunjungan');
    }
};
