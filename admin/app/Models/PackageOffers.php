<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageOffers extends Model
{
    protected $table='package_offer';
    public $timestamps = false;
    protected $casts = [
        'hotel_room_cost_info' => 'array',
    ];

    protected $fillable = [
        'valid_from',
        'valid_till',
        'departure_date',
        'departure_time',
        'package_id',
        'hotel_room_cost_info',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

}
