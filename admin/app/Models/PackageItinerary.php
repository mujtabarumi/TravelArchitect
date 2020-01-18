<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    protected $table='package_itineraries';
    public $timestamps = false;

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function itineraryIncludes()
    {
        return $this->hasMany(PackageItineraryInclude::class);
    }
}
