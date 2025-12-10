<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $table = 'sales_pickups';

    protected $fillable = [
        'order_id',
        'sales_id',
        'pickup_date',
        'notes',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function sales()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}
