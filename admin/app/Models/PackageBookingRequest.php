<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBookingRequest extends Model
{
    protected $table = 'package_booking_request';

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

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
        'offer_id',
        'price',
        'details',
        'meta',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
