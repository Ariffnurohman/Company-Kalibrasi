<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPickup extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id',
        'customer',
        'equipment',
        'pickup_date',
        'status',
    ];

    public function sales()
    {
        return $this->belongsTo(\App\Models\User::class, 'sales_id');
    }
}
