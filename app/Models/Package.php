<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    protected $table='packages';
    use SoftDeletes;

    public function itineraries()
    {
        return $this->hasMany(PackageItinerary::class);
    }
}
