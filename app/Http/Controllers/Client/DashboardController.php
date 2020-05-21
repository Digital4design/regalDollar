<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Models\InvestmentModel;
use App\Models\Plan;
use Validator;
use DB;
use Carbon\Carbon;
use DateTime;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        if(Auth::user()->is_verify =="pending"){
            return redirect('/investment/create-step2');
            // return redirect('/front/create-step2');
        }
        $investmentData = InvestmentModel::where('user_id',$user_id)
        //->where('paypal_transaction_id','!=', '')
        ->orderBy('id', 'DESC')
        ->first();
        
       
        $plan_id = $investmentData['plan_id'];
        $planData = Plan::where('id',$plan_id)->first();
        $investData = DB::table('investment')
              ->select('investment.*','plans.interest_rate','plans.plan_name','plans.time_investment','plans.plan_fee')
              ->join('plans','plans.id','=','investment.plan_id')
              ->where('investment.user_id', $user_id)
              ->where('investment.paypal_transaction_id','!=', '')
              ->get();
        //dd($investData);
        
        $graphData=array();
        /*
        $totalgainData=0;
        foreach($investData as $invData){
            // dd($invData);
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($invData->plan_start_date);
            $interval = $datetime1->diff($datetime2);
            $fee = $invData->plan_fee;
            $amount = $invData->amount;
            $time_investment = $invData->time_investment;
            if($interval->m > 0){
                $inst = $amount * $invData->interest_rate / $interval->m;
                $gains = $amount+$inst;
                $totalgainData += $gains - $fee;
                for($i=1; $i<=$interval->m; $i++){
                    $instrData = $amount * $invData->interest_rate / $i;
                    $gainData = $amount+$instrData;
                    // $totalgain += $gain - $fee;
                    $graphData[]=[
                        'baseamount'=>$amount,
                        'netgrouth'=>$gainData
                    ];
                }
                
                
            }else{
                $graphData[]=[
                    'baseamount'=>$amount,
                    'netgrouth'=>$amount
                ];
            }
        }
        */
        // dd($graphData);
        $totalgain=0;
        foreach($investData as $invest){
            // dd($invest->plan_fee);
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($invest->plan_start_date);
            $interval = $datetime1->diff($datetime2);
            //dd($interval);
            $fee = $invest->plan_fee;
            // dd($fee);
            $amount = $invest->amount;
            $time_investment = $invest->time_investment;
            // dd($interval->m);
            if($interval->m > 0){
                // $instr = $amount * $invest->interest_rate / $time_investment;
                $instr = $amount * $invest->interest_rate / $interval->m;
                $gain = $amount+$instr;
                $totalgain += $gain - $fee;

                $graphData[]=[
                    'baseamount'=>$amount,
                    'netgrouth'=>$gain
                ];
            }else{
                $totalgain +=$amount;
                $graphData[]=[
                    'baseamount'=>$amount,
                    'netgrouth'=>$amount
                ];
            }
            //dd($totalgain);
        }
        // dd($totalgain);
        //dd($investData);
        $result = array(
            'pageName'      => 'Dashboard',
            'activeMenu'    => 'dashboard',
            'activePlan'    => $planData,
            'investAmount'  => $investmentData['amount'],
            'matureDate'    => $investmentData['plan_end_date'],
            'investData'    => $investData,
            'totalgain'     => $totalgain,
            'activeInvest'  => $investmentData,
            'graphData'     => $graphData
        );
        return view('client.dashboard.dashboard', $result);
    }
    public function myAccount()
    {
      if (!empty(Auth::user()->state_id)) {
            $states = State::find(Auth::user()->state_id);
        } else {
            $states = '';
        }
        if (!empty(Auth::user()->city_id)) {
            $city = City::find(Auth::user()->city_id);
        } else {
            $city = '';
        }
        $vars['country'] = Country::select('id', 'name')->get();
        $vars['activeMenu'] = 'account';
        $vars['states'] = $this->gen_states();
        return view('client.dashboard.profile', compact('vars', 'states', 'city'));
    }
    public function editAccount(Request $request)
    {
        $rules = [
            'first_name' => 'required|min:2|regex:/^[A-Za-z. -]+$/',
            'last_name' => 'required|min:2|regex:/^[A-Za-z. -]+$/',
            'birthday' => 'required',
            'zipcode' => 'required|numeric',
        ];
        $messages = [
            'first_name.required' => 'Your first name is required.',
            'last_name.min' => 'First name should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $user = User::find(Auth::user()->id);
            $user->first_name = trim($request->first_name);
            $user->last_name = trim($request->last_name);
            $user->address = trim($request->address);
            $user->address2 = trim($request->address2);
            $user->birthday = trim($request->birthday);
            $user->accountType = trim($request->accountType);
            $user->phoneNumber = trim($request->phoneNumber);
            $user->zipcode = trim($request->zipcode);
            $user->social_security_number = trim($request->social_security_number);
            $user->save();
            return redirect('/client/account')->with(['pstatus' => 'success', 'pmessage' => 'Your details updated successfully!']);
        } catch (\Exception $e) {
            return back()->with(['pstatus' => 'danger', 'pmessage' => $e->getMessage()]);
        }
    }
    public function editAccountPassword(Request $request)
    {
        $rules = [
            'password' => 'required|string|min:6|confirmed',
            'currentPassword' => 'required|',
        ];
        $messages = [
            'password.required' => 'New Password is required.',
            'password.min' => 'New password should contain at least 6 characters.',
            'currentPassword.required' => 'Current password is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $current_password = Auth::User()->password;
            if (Hash::check($request->currentPassword, $current_password)) {
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt(trim($request->password));
                $user->save();
                return redirect('/client/account')->with(['status' => 'success', 'message' => 'your password updated successfully!']);
            } else {
                return back()->with(['status' => 'danger', 'message' => 'current password not match with our record, please try again.']);
            }
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
