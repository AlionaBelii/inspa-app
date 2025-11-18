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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string("fullname_ru", 50)->unique();
            $table->string("fullname_en", 50)->unique();
            $table->integer("experience_years")->default(0);
            $table->text("description_ru")->nullable();
            $table->text("description_en")->nullable();
            $table->string("filename")->nullable();
            $table->string("alt_text")->nullable();
            $table->string("slug_ru", 50);
            $table->string("slug_en", 50);
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade");
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
