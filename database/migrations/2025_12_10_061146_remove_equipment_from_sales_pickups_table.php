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
            $table->dropColumn('equipment');
        });
    }
    
    public function down()
    {
        Schema::table('sales_pickups', function (Blueprint $table) {
            $table->string('equipment')->nullable();
        });
    }
    
};
