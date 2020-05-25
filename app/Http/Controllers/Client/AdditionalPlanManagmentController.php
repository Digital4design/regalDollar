<?php

namespace App\Http\Controllers\Client;

use App\Notifications\Users\InvestmentConformationMail;
use App\Models\DocumentManagemetModel;
use App\Http\Controllers\Controller;
use App\Models\InvestmentModel;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\User;
use Redirect;
use Validator;
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
        $result = array('pageName' => 'Dashboard',
            'activeMenu' => 'create-account',
            'selected'=>$id,
            'planData'=>$planData,
        );
        return view('client.newPlanManagment.selectNewPlan', $result);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $planData = Plan::find($request->plan_id);
        $date = date("Y-m-d");
        //$date = $planData->plan_start_date;
        $date = strtotime($date);
        $new_date = strtotime('+ ' . $planData->time_investment . ' month', $date);
        $valid_till = date('Y-m-d', $new_date);
        $investmentdata = InvestmentModel::create([
            'user_id' => Auth::user()->id,
            'plan_id' => $request->plan_id,
            'plan_start_date'=>date("Y-m-d"),
            'plan_end_date'=>$valid_till,
            'amount'=>$planData['price'],
        ]);
        $userData = $request->session()->put('investmentdata', $investmentdata);
        $result = array(
            'pageName' => 'Dashboard',
            'activeMenu' => 'create-account', 
            'investmentId'=>$investmentdata['id'],
            
        );
        return view('client.newPlanManagment.amountSelection', $result);
        //return view('client.newPlanManagment.aggrement', $result);
    }

    public function updateAmount(Request $request){
        
        $rules = [
            'finalamount' => 'required',
            //'amount' => 'required',
        ];
        $messages = [
            'finalamount.required' => 'amount is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            InvestmentModel::where('id',$request->investmentId)->update(['amount' => $request->finalamount]);
            $investmentData = InvestmentModel::where('id',$request->investmentId)->first();
            $investmentData = $request->session()->put('investmentData', $investmentData);
            $investmentData['userData'] = $request->session()->get('investmentData');
            return Redirect::to('client/purchase-new-plan/agreement');

        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            echo $e->getMessage();
        }
    }
    public function agreement(Request $request){
        $investmentdata =  $request->session()->get('investmentData');

        $documentData = DocumentManagemetModel::where('plan_id', $investmentdata['plan_id'])->get();
        // dd($documentData);
  
        $result = array(
            'pageName' => 'Dashboard',
            'activeMenu' => 'create-account', 
            'investmentId'=>$investmentdata['id'],
            'documentData'=>$documentData
            
        );
        return view('client.newPlanManagment.aggrement', $result);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAggrement(Request $request){
        
        if ($request->signature) {
            $imagedata = base64_decode($request->signature);
            $filename = md5(date("dmYhisA"));
            $file_path = 'public/uploads/signature' . '/' . $filename . '.png';
            file_put_contents($file_path, $imagedata);
        }
        $indicate = json_encode($request->indicateagreement);
        $userData = InvestmentModel::find($request->investmentId);
        $userData->indicateagreement = $indicate;
        $userData->reinvestment = $request->reinvestment;
        if ($request->signature) {
            $userData->signature = $filename .'.png';
        }
        $userData->save();
        $investmentdata = InvestmentModel::find($request->investmentId);
        $investmentdata = $request->session()->put('investmentdata', $investmentdata);
        $investmentdata = $request->session()->get('investmentdata');
        $result = array(
            'pageName' => 'Dashboard',
            'activeMenu' => 'create-account',
            'investmentdata'=>$investmentdata,
        );
        return view('client.newPlanManagment.paymentProcess', $result);
    }
    public function updatePayment($id,Request $request)
    {
        $investmentdata = $request->session()->get('investmentdata');
       
        $userData = InvestmentModel::find($investmentdata['id']);
        $userData->paypal_transaction_id = $id;
        $userData->save();
        $investmentdata = InvestmentModel::find($investmentdata['id']); 


        $userData = User::find(Auth::user()->id);
        // dd($userData);
        $investData = InvestmentModel::find($investmentdata['id']);
        
        // dd(Auth::user()->first_name);
        $notificationData = [
            "user" => $userData['name'],
            "message" => Auth::user()->first_name." You have invest  $".$investData['amount']." with trancation id ".$investData['paypal_transaction_id']." will complete on ".$investData['plan_end_date'], 
            "investmentId" => $investData['id']
        ];
         //dd($notificationData);

        //$userData->notify(new WithdrawReaction($notificationData));
        $userData->notify(new InvestmentConformationMail($notificationData));

        return redirect('/client');
    } 
    
}
