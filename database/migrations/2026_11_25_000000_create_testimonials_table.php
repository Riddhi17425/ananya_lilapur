<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1)->comment('1 = active, 0 = inactive');
            $table->string('name');
            $table->text('description');
            $table->unsignedTinyInteger('star')->default(5)->comment('1 to 5');
            $table->string('reviewer_category')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
