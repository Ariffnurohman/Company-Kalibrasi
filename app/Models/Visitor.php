<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'last_activity',
    ];

    public $timestamps = false; // karena kita pakai last_activity manual
}
