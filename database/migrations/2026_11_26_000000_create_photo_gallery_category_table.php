<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photo_gallery_category', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1)->comment('1 = active, 0 = inactive');
            $table->string('category_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_gallery_category');
    }
};
