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
        Schema::create('project_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constained('users')->onDelete('cascade');
            $table->foreignId('worker_id')->constained('workers')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constained('subcategories')->onDelete('cascade');
            $table->string('fullname', 50);
            $table->string('company_name')->nullable();
            $table->string('email');
            $table->string('phonenumber')->nullable();
            $table->text('project_description');
            $table->string('prefered_deadline')->nullable();
            $table->string('reference_file')->nullable();
            $table->enum('status', ['new', 'in_progress', 'rejected', 'completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_requests');
    }
};
