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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("title_en", 255);
            $table->string("title_ru", 255);
            $table->string("sh_description_en", 255);
            $table->string("sh_description_ru", 255);
            $table->text("description_en");
            $table->text("description_ru");
            $table->string("slug_en", 255);
            $table->string("slug_ru", 255);
            $table->string("filename", 255)->nullable();
            $table->string("altname", 255)->nullable();
            $table->foreignId("category_id")->constrained("categories")->onDelete("restrict");
            $table->foreignId("user_id")->constrained("users")->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
