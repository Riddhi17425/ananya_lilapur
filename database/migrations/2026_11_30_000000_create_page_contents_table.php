<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Static website content edited by the admin ("Pages Content" module).
     * Only values that differ from the original text / image are stored here;
     * the original values live in config/page_content/<page>.php.
     */
    public function up(): void
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page', 50)->comment('home, about, academics ...');
            $table->string('field_key', 100)->comment('field name from config/page_content/<page>.php');
            $table->longText('value')->nullable()->comment('text / html, or the image path on the public disk');
            $table->timestamps();

            $table->unique(['page', 'field_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
