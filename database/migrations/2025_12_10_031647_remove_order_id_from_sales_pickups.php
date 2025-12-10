<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sales_pickups', function (Blueprint $table) {
            // Hapus dahulu foreign key
            $table->dropForeign(['order_id']);
    
            // Baru hapus kolom
            $table->dropColumn('order_id');
        });
    }
    
    public function down()
    {
        Schema::table('sales_pickups', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }
    
};
