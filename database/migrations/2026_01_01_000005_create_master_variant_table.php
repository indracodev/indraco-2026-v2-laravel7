<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterVariantTable extends Migration
{
    public function up(): void
    {
        Schema::create('master_variant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->nullable()->constrained('master_type')->cascadeOnDelete();
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
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_variant');
    }
}
