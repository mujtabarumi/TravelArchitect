<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;


class Package extends Model implements HasMedia
{
    protected $table = 'packages';

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
        'departure_from',
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
        return $this->morphOne(Address::class, 'model');
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
        $this->addMediaCollection('slider_images');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('popular')
            ->width(270)
            ->height(120)
            ->sharpen(10);

        $this->addMediaConversion('recommended')
            ->width(265)
            ->height(420)
            ->sharpen(10);

        $this->addMediaConversion('slider')
            ->width(742)
            ->height(300)
            ->sharpen(10);

        $this->addMediaConversion('banner')
            ->width(1350)
            ->height(230)
            ->sharpen(10);

        $this->addMediaConversion('search-list')
            ->width(200)
            ->height(133)
            ->sharpen(10);

    }

    /*
     *  All attributes are starts form here
     * */

    public function getIsExpiredAttribute()
    {
        return Carbon::now()->format('Y-m-d') > $this->valid_till->format('Y-m-d');
    }

    public function getIsRecommendedAttribute()
    {
        return $this->recommended == 1;
    }

    public function getIsPopularAttribute()
    {
        return $this->popular == 1;
    }
}
