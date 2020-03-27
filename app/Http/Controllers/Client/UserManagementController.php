<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\DocumentManagemetModel;
use App\Http\Controllers\Controller;
use App\Models\UserRoleRelation;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Plan;
use App\Models\Role;
use Validator;
use App\User;
use Auth;
use Crypt; 
use Hash;

class UserManagementController extends Controller
{
    public function index(){
        $planData = Plan::where('plan_type', '1')->orderBy('id', 'desc')->get();
        // dd($planData);
        $result = array('pageName' => 'Dashboard',
            'activeMenu' => 'create-account',
            'planData'=>$planData,
        );
        return view('client.userManagemet.create_user', $result);
    }
}
