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
        $investmentdata = InvestmentModel::create([
            'user_id' => Auth::user()->id,
            'plan_id' => $request->plan_id,
            'plan_start_date'=>$planData['plan_valid_from'],
            'plan_end_date'=>$valid_till,
            'amount'=>$planData['price'],
        ]);
        $userData = $request->session()->put('investmentdata', $investmentdata);
        $result = array(
            'pageName' => 'Dashboard',
            'activeMenu' => 'create-account', 
            'investmentId'=>$investmentdata['id'],
            
        );
        return view('client.newPlanManagment.aggrement', $result);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAggrement(Request $request){
        // dd($request->all());
        $indicate = json_encode($request->indicateagreement);
        $userData = InvestmentModel::find($request->investmentId);
        $userData->indicateagreement = $indicate;
        $userData->reinvestment = $request->reinvestment;
        $userData->save();
        $investmentdata = InvestmentModel::find($request->investmentId);
        $investmentdata = $request->session()->put('investmentdata', $investmentdata);
        $investmentdata = $request->session()->get('investmentdata');
        $result = array(
            'pageName' => 'Dashboard',
            'activeMenu' => 'create-account',
        );
        return view('client.newPlanManagment.paymentProcess', $result);
    }
    public function updatePayment($id,Request $request)
    {
        $investmentdata = $request->session()->get('investmentdata');
        $userData = InvestmentModel::find($investmentdata['id']);
        $userData->paypal_transaction_id = $id;
        $userData->save();
        $investmentdata = InvestmentModel::find($request->investmentId);
        return redirect('/client');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
