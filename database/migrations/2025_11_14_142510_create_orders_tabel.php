<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->string('order_number')->unique();
    $table->string('customer_name');
    $table->string('instrument');
    $table->enum('status', ['Pending', 'Processing', 'Calibration', 'Waiting Certificate', 'Completed'])
          ->default('Pending');
    $table->date('received_date')->nullable();
    $table->date('completed_date')->nullable();
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
