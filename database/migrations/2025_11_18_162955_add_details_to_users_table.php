<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user', 'admin', 'worker'])->default('user')->after('email');
            $table->string('filename', 255)->nullable()->after('email');
            $table->string('alt_text', 255)->nullable()->after('filename');
            
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'alt_text')) {
                // $table->dropColumn(['fullname', 'status', 'filename', 'alt_text', 'role']);
            }
        });
    }
};