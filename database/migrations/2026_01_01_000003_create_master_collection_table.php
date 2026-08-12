<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCollectionTable extends Migration
{
    public function up(): void
    {
        Schema::create('master_collection', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merek_id')->nullable()->constrained('master_merek')->nullOnDelete();
            $table->string('collection_name');
            $table->string('slug')->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_collection');
    }
}
