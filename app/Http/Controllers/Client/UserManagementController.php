<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DocumentManagemetModel;
use App\Models\Plan;
use App\Models\Role;
use App\Models\State;
use App\Models\UserRoleRelation;
use App\User;
use Auth;
use Crypt;
use Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;

class UserManagementController extends Controller
{
    public function index(){

        $result = array('pageName' => 'Dashboard',
            'activeMenu' => 'create-account',
        );
        return view('client.userManagemet.create_user', $result);
    }
}
