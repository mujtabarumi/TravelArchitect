<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type_id',
        'status',
        'mobile_number',
        'country_id',
        'passport_number',
        'passport_expiry_date',
        'nationality',
        'national_id_number',
        'dob',
         'gender',
        'marital_status',
        'spouse_name',
        'occupation'

    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table='users';
    protected $primaryKey='id';
}
