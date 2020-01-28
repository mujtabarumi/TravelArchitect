<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageItineraryInclude extends Model
{
    protected $table='package_itinerary_includes';
    public $timestamps = false;

    protected $fillable = [
        'text',
        'package_itinerary_id'
    ];

    public function itinerary()
    {
        return $this->belongsTo(PackageItinerary::class,'package_itinerary_id');
    }
}
