<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeopleSearchFlight extends Model
{
    protected $table='people_search_flights';
    public $primaryKey = 'id';
    use SoftDeletes;
    /**
     *  Get user
     */

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
