<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\InvestmentModel;
use App\User;
use Auth;
use Crypt;
use Hash;

class AdditionalPlanManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        
        $planData = Plan::where('plan_type', '1')->orderBy('id', 'desc')->get();
        // dd($planData);
        $result = array('pageName' => 'Dashboard',
            'activeMenu' => 'create-account',
            'planData'=>$planData,
        );
        return view('client.newPlanManagment.selectNewPlan', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planData = Plan::find($request->plan_id);
        $date = $planData->plan_start_date;
        $date = strtotime($date);
        $new_date = strtotime('+ ' . $planData->time_investment . ' month', $date);
        $valid_till = date('Y-m-d', $new_date);
        InvestmentModel::create([
            'user_id' => Auth::user()->id,
            'plan_id' => $request->plan_id,
            'plan_start_date'=>$planData['plan_valid_from'],
            'plan_end_date'=>$valid_till,
            'amount'=>$planData['price'],
        ]);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
