<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'plans';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'plan_name',
        'slogan',
        'icon',
        'price',
        'duration',
        'time_investment',
        'descritpion',
        'plan_valid_from',
        'plan_type',
        'banner',
    ];
    /**
     * Return current login user role here.
     * @var string
     */

}
