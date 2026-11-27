<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The list image is shown on the home page slider and the inner image on the News & Gallery
     * page (Life on Campus). A photo can be used on one page or both, so each image is optional
     * (the form still needs at least one).
     */
    public function up(): void
    {
        Schema::table('photo_galleries', function (Blueprint $table) {
            $table->string('list_image')->nullable()->comment('home page slider image, path on the public disk')->change();
            $table->string('inner_image')->nullable()->comment('News & Gallery page image, path on the public disk')->change();
        });
    }

    public function down(): void
    {
        Schema::table('photo_galleries', function (Blueprint $table) {
            $table->string('list_image')->nullable(false)->change();
            $table->string('inner_image')->nullable(false)->change();
        });
    }
};
