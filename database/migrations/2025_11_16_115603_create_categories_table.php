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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("title_en", 50)->unique();
            $table->string("title_ru", 50)->unique();
            $table->string("slug_en", 50);
            $table->string("slug_ru", 50);
            $table->string("worker_title_en", 50)->unique();
            $table->string("worker_title_ru", 50)->unique();
            $table->string("filename")->nullable();
            $table->string("alt_text")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
