<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'country_id'];



    /**
     *  Get cities
     */

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public $timestamps = false;
}
