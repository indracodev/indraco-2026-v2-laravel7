<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTypeTable extends Migration
{
    public function up(): void
    {
        Schema::create('master_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_id')->nullable()->constrained('master_collection')->nullOnDelete();
            $table->string('type_name');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_type');
    }
}
