<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'state_id', 'city_id', 'postal_code', 'address_line_1', 'address_line_2', 'model_id', 'model_type'
    ];

    protected $with = ['country', 'state', 'city'];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getCityAndCountryAttribute()
    {
        $cityName = data_get($this->city,'name','N/A');
        $countryName = data_get($this->country,'name','N/A');

        if ($countryName == 'N/A' && $cityName == 'N/A') {
            return "N/A";
        } else {
            return "{$cityName}, {$countryName}";
        }


    }
}
