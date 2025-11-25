<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'instrument',
        'status',
        'received_date',
        'completed_date',
        'technician_id',
    ];

    public function technician()
{
    return $this->belongsTo(User::class, 'technician_id');
}

}

