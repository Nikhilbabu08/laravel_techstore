<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tech_posts', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('topic');
            $table->string('description');
            $table->string('image');
            $table->timestamp('published_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_posts');
    }
};
