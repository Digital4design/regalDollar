<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class State extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name','country_id' ];

    /**
     * Return current login user role here.
     *
     * @var string
     */
	
	public function City()
    {
		return $this->hasMany('App\Models\City','state_id','id');
	}
    

	
}
