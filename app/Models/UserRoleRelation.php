<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class UserRoleRelation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_user';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id' ];

    /**
     * Return current login user role here.
     *
     * @var string
     */
	
	public function Role()
    {
		return $this->belongsTo('App\Role','role_id','id');
	}
    

	
}
