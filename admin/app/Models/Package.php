<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    protected $table='packages';
    use SoftDeletes;

    protected $dates = [
        'valid_from',
        'valid_till',
        'departure_date'
    ];

    protected $fillable = [
        'title',
        'details',
        'inclusion',
        'exclusion',
        'additional_info',
        'package_type_id',
        'city_id',
        'theme_map',
        'duration',
        'budget',
        'recommended',
        'popular',
        'air_price_included',
        'departure_date',
        'valid_from',
        'valid_till',
        'is_everyday_departs',
        'created_at',
        'updated_at'
    ];

    public function itineraries()
    {
        return $this->hasMany(PackageItinerary::class);
    }

}
