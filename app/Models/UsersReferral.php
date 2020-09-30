<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersReferral extends Model
{
     /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'users_referrals';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'referral_code',
        'email',
        'status',
    ];
    /**
     * Return current login user role here.
     * @var string
     */
}
