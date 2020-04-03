<?php

namespace App;

use App\Role;
use Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'address2',
        'plan_start_date',
        'plan_end_date',
        'country_id',
        'accountType',
        'zipcode',
        'name',
        'email',
        'password',
        'plan_id',
        'phoneNumber',
        'birthday',
        'social_security_number',
        'amount',
        'country_citizenship',
        'country_residence',
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
    public function isAdmin()
    {
        $role = Role::join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->where('user_id', Auth::user()->id)
            ->first();
        return $role->name == 'admin' ? true : false;

    }
    public function getRole()
    {
        return $this->hasOneThrough('App\Role', 'App\Models\UserRoleRelation', 'user_id', 'id', 'id', 'role_id');
    }
    /**
     * Check Roles customer here
     *
     * @var array
     */
    public function isClient()
    {
        $role = Role::join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->where('user_id', Auth::user()->id)
            ->first();
        return $role->name == 'client' ? true : false;
    }
    /**
     * Return user role here.
     *
     * @var string
     */
    public static function userRole($uid)
    {
        $data = self::join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->where('user_id', $uid)
            ->first();
        return $data->name;
    }
    public function getRolesUser()
    {
        return $this->belongsTo('App\Models\UserRoleRelation', 'id', 'user_id');
    }
}
