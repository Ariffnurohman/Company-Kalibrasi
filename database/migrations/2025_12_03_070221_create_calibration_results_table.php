<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */public function up()
{
    Schema::create('calibration_results', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');
        $table->unsignedBigInteger('technician_id');
        
        // Data kalibrasi
        $table->json('measurements')->nullable(); // menyimpan hasil pengukuran
        $table->string('status')->default('Pending'); // OK / Adjustment Needed / Failed
        $table->text('notes')->nullable(); // catatan teknisi
        
        // foto
        $table->string('photo_before')->nullable();
        $table->string('photo_after')->nullable();

        // workflow
        $table->timestamp('start_time')->nullable();
        $table->timestamp('finish_time')->nullable();

        $table->timestamps();

        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('technician_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calibration_results');
    }
};
