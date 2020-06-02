<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Auth;
use App\Models\Plan;

class PlansManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planData = Plan::where('plan_type', '1')->orderBy('id', 'desc')->get();
        // dd($planData);
        $result = array('pageName' => 'Dashboard',
            'activeMenu' => 'investment_plans',
            'planData'=>$planData,
        );
        return view('client.plansMangment.index', $result);
    }
}
