<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_stages', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1)->comment('1 = active, 0 = inactive');
            $table->unsignedSmallInteger('sort_order')->default(0)->comment('tab order, lowest first');
            $table->string('tab_name', 100);
            $table->string('kicker');
            $table->string('heading');
            $table->text('description');
            $table->text('points')->nullable()->comment('tick list, one per line');
            $table->text('classes')->nullable()->comment('class chips, one per line');
            $table->string('image');
            $table->string('image_alt')->nullable();
            $table->unsignedSmallInteger('image_width')->default(340);
            $table->boolean('image_arch')->default(0)->comment('arch-shaped image');
            $table->string('badge', 100)->nullable()->comment('e.g. Coming soon');
            $table->boolean('notify_button')->default(0)->comment('show the Notify Me When Available button');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_stages');
    }
};
