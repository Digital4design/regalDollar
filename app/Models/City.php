<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name','state_id' ];

    /**
     * Return current login user role here.
     *
     * @var string
     */
	
	
    

	
}
