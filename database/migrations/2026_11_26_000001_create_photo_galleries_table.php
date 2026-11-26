<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1)->comment('1 = active, 0 = inactive');
            $table->foreignId('category_id')->constrained('photo_gallery_category');
            $table->string('name');
            $table->string('list_image')->comment('path on the public disk');
            $table->string('inner_image')->comment('path on the public disk');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_galleries');
    }
};
