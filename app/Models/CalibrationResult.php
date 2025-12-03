<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalibrationResult extends Model
{
    protected $fillable = [
        'order_id',
        'technician_id',
        'measurements',
        'status',
        'notes',
        'photo_before',
        'photo_after',
        'start_time',
        'finish_time'
    ];

    protected $casts = [
        'measurements' => 'array',
    ];
}
