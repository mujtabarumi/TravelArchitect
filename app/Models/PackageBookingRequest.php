<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBookingRequest extends Model
{
    protected $table = 'package_booking_request';

    protected $dates = [
        'departure_date'
    ];
    protected $casts = [
        'meta'  =>  'array',
    ];

    protected $fillable = [
        'departure_date',
        'travel_by',
        'duration',
        'package_id',
        'price',
        'details',
        'meta',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
