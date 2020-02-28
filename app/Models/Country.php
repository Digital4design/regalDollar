<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sortname_code', 'name','phonecode' ];

    /**
     * Return current login user role here.
     *
     * @var string
     */
	
	public function State()
    {
		return $this->hasMany('App\Models\State','country_id','id');
	}
    

	
}
