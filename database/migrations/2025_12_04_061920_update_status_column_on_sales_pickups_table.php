<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sales_pickups', function (Blueprint $table) {
            // Ubah kolom status menjadi ENUM baru
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('sales_pickups', function (Blueprint $table) {
            // Kembalikan ke default sebelumnya jika dibutuhkan
            $table->enum('status', ['pending', 'done', 'canceled'])
                  ->default('pending')
                  ->change();
        });
    }
};
