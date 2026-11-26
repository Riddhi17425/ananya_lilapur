<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** One table for every website form; the "type" column tells them apart. */
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->index()->comment('enquire, visit, career, contact, notify');
            $table->string('name');
            $table->string('email');
            $table->string('mobile', 20);
            $table->string('child_name')->nullable();
            $table->string('class_applying', 50)->nullable();
            $table->string('current_school')->nullable();
            $table->dateTime('visit_at')->nullable()->comment('preferred visit date / time');
            $table->unsignedTinyInteger('visitors')->nullable();
            $table->string('position', 100)->nullable()->comment('career: area of interest');
            $table->string('experience', 100)->nullable();
            $table->string('resume_path')->nullable()->comment('career: file on the private disk');
            $table->string('subject', 50)->nullable();
            $table->text('message')->nullable();
            $table->string('source', 50)->nullable()->comment('which form or button it came from');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
