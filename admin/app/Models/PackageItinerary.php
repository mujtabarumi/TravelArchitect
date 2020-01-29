<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    protected $table='package_itineraries';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'details',
        'package_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function itineraryIncludes()
    {
        return $this->hasMany(PackageItineraryInclude::class);
    }
}
