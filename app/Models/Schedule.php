<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function up()
{
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');
        $table->enum('pickup_type', ['pickup', 'dropoff']);
        $table->dateTime('pickup_datetime');
        $table->date('start_date');
        $table->date('end_date');
        $table->unsignedBigInteger('teknisi_id');   
        $table->text('catatan')->nullable();
        $table->timestamps();

        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('teknisi_id')->references('id')->on('users')->onDelete('cascade');
    });
}

}
