<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;


class Package extends Model implements HasMedia
{
    protected $table='packages';

    use HasMediaTrait;
    use SoftDeletes;

    const PACKAGE_COVER_COLLECTION = 'cover_photo';

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
        'updated_at',
        'status',
        'steps'
    ];

    public function itineraries()
    {
        return $this->hasMany(PackageItinerary::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class,'model');
    }

    public function getImageAttribute()
    {

        $packageImage = $this->getMedia(self::PACKAGE_COVER_COLLECTION)->last();

        if (blank($packageImage)) {
            return asset('assets/images/bg-image9.jpg');
        }

        return $packageImage->getUrl();
    }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('cover_photo')->singleFile();
        $this->addMediaCollection('slider_images')->singleFile();
    }

}
