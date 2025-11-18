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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("title_name_ru", 255);
            $table->string("title_name_en", 255);
            $table->text("description_ru");
            $table->text("description_en");
            $table->string("filename")->nullable();
            $table->string("alt_text")->nullable();
            $table->decimal("price", 16, 2)->nullable();
            $table->enum("status", ["draft", "in progress", "published"])->default("draft");
            $table->foreignId("subcategory_id")->constrained("subcategories")->onDelete("restrict");
            $table->foreignId("worker_id")->constrained("workers")->onDelete("restrict");
            $table->timestamps();
            $table->timestamp("to_finish_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
