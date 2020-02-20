<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sort_name', 'name', 'phone_code', 'nationality'];

    public $timestamps = false;

    public function getNameAndCodeAttribute()
    {
        return "{$this->name}(+{$this->phone_code})";
    }

    /**
     *  Get states
     */

    public function states()
    {
        return $this->hasMany(State::class);
    }

    /**
     *  Get cities of the country
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function cities() {
        return $this->hasManyThrough('App\Models\City', 'App\Models\State');
    }
}
