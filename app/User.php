<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
Use App\Role;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check Roles admin here 
     *
     * @var array
     */
    public function isAdmin(){
        $role = Role::join('role_user','roles.id','=','role_user.role_id')
                      ->where('user_id',Auth::user()->id)
                      ->first();
        return $role->name == 'admin' ? true : false;
       
    }
    public function getRoles()
    {
        return $this->hasOneThrough('App\Models\Role', 'App\Models\UserRoleRelation', 'user_id', 'id', 'id', 'role_id');
    }
    /**
     * Check Roles customer here 
     *
     * @var array
     */
    public function isClient(){
        $role = Role::join('role_user','roles.id','=','role_user.role_id')
        ->where('user_id',Auth::user()->id)
        ->first();
        return $role->name == 'client' ? true : false;
    }
    /**
     * Return user role here.
     *
     * @var string
     */
     public static function userRole($uid){
         $data = self::join('role_user','roles.id','=','role_user.role_id')
         ->where('user_id',$uid)
         ->first();
         return $data->name;
    }
    public function getRolesUser(){
        return $this->belongsTo('App\Models\UserRoleRelation','id','user_id');
    }
}
