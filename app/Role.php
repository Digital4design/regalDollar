<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Auth;
use DB;

class Role extends EntrustRole
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name','description','display_name'
    ];

    /**
     * Return current login user role here.
     *
     * @var string
     */
    public static function isRole(){
    	$data = self::join('role_user','roles.id','=','role_user.role_id')
    				  ->where('user_id',Auth::user()->id)
    				  ->first();

    	return $data->name;
    }
	
	/**
        * Checks if the role has a permission by its name.
        *
        * @param numeric $roleId|string $permissionName - Role ID and permission name.
        *
        * @return bool
      */
         public static function hasCustomPermission($roleId, $permissionName)
         {
              $role = Role::findOrFail($roleId);
              $role_permissions = $role->perms()->get();
                   foreach ($role_permissions as $permission) {
                       if ($permission->id == $permissionName) {
                           return true;
                       }
                   }
              return false;
         }
		 
		
	 
}
