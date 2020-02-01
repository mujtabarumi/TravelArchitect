<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeopleSearchPackage extends Model
{
    protected $table='people_search_packages';
    public $primaryKey = 'id';
    //use SoftDeletes;
    /**
     *  Get user
     */

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
