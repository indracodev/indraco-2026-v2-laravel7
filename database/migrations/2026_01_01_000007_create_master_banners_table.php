<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterBannersTable extends Migration
{
    public function up(): void
    {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('master_banners');
    }
}
