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

       
        $chartData[]=  $this->getUsersPlanName($investData);
        foreach($investData as $key=>$invest){
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($invest->plan_start_date);
            $interval = $datetime1->diff($datetime2);
            $fee = $invest->plan_fee;
            $amount = $invest->amount;
            $time_investment = $invest->time_investment; 
            if($interval->m > 0){
                for($i=1; $i<=$interval->m; $i++){
                    $instrData = $amount * $invest->interest_rate * $i / 100;					
                    $gainData = $amount+$instrData -$fee ;
                    $chartData[]=array($i,(int)$gainData);
                }
                
            }else{
                $chartData[]=array($key,(int)$invest->amount);
            }
            
        }
        $graphData=array();
        $totalgainData=0;
        foreach($investData as $invData){
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($invData->plan_start_date);
            $interval = $datetime1->diff($datetime2);
            $fee = $invData->plan_fee;
            $amount = $invData->amount;
            $time_investment = $invData->time_investment;

            if($interval->m > 0){
                $inst = $amount * $invData->interest_rate * $interval->m / 100;
                $gains = $amount+$inst;
                $totalgainData += $gains - $fee;                
                $graphData[]=[                    
                    'investId'=>$invData->id,
                    'plan_name'=>$invData->plan_name,
                    'baseamount'=>$amount,
                    'netgrouth'=>$gainData
                ];
            }else{
                $graphData[]=[
                    'investId'=>$invData->id,
                    'plan_name'=>$invData->plan_name,
                    'baseamount'=>$amount,
                    'netgrouth'=>$amount
                ];
            }
        }
        
        $totalgain=0;
        foreach($investData as $invest){
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($invest->plan_start_date);
            $interval = $datetime1->diff($datetime2);
            $fee = $invest->plan_fee;
            $amount = $invest->amount;
            $time_investment = $invest->time_investment;
            if($interval->m > 0){
                // $instr = $amount * $invest->interest_rate / $time_investment;
                $instr = $amount * $invest->interest_rate * $interval->m/ 100 ;
                $gain = $amount+$instr;
                $totalgain += $gain - $fee;
                
            }else{
                $totalgain +=$amount;
            }
            
        }
        $chartData = $this->genrateLineChartData();
       
        $result = array(
            'pageName'      => 'Dashboard',
            'activeMenu'    => 'dashboard',
            'activePlan'    => $planData,
            'investAmount'  => $investmentData['amount'],
            'matureDate'    => $investmentData['plan_end_date'],
            'investData'    => $investData,
            'totalgain'     => $totalgain,
            'activeInvest'  => $investmentData,
            'graphData'     => $graphData,
            'chartData'     => $chartData
        );
        return view('client.dashboard.dashboard', $result);
    }
    /*
	|------------
	| Description : this will return json data which is used to generate line chart;
	| @prams	  : $investData array
	| @return     : array
	*/
	
    public function genrateLineChartData()
    {
        $user_id = Auth::user()->id;
        // get user first investment 
        $getUserFirstInvestment = InvestmentModel::where('investment.user_id', $user_id)
                                ->where('investment.paypal_transaction_id','!=', '')
                                ->orderBy('investment.plan_start_date', 'Asc')
                                ->first();
        if($getUserFirstInvestment){
            // get user all investments 
            $allInvestments = DB::table('investment')
								->select('investment.*','plans.interest_rate','plans.plan_name','plans.time_investment','plans.plan_fee')
								->join('plans','plans.id','=','investment.plan_id')
								->where('investment.user_id', $user_id)
								->where('investment.paypal_transaction_id','!=', '')
								->orderBy('investment.plan_start_date', 'Asc')
                                ->get();
            // set month and plan name in array
            $chartData[]= $onlyPlans =  $this->getUsersPlanName($allInvestments);
            // get time difference
            $currentDate 				= new DateTime(date("Y-m-d"));
            $firstInvestmentStartFrom 	= new DateTime($getUserFirstInvestment->plan_start_date);
            $totalInvestmentMonths 		= $currentDate->diff($firstInvestmentStartFrom);
            $allMonths = $this->get_months($getUserFirstInvestment->plan_start_date, date("Y-m-d"));
            // get total months
            if(count($allMonths) > 0){
                // remove 0 index from plan name array
                array_splice($onlyPlans, 0, 1);
                if(count($onlyPlans) > 0 ){
                    foreach($allMonths as $month){
                        $chartData[] = $this->calculatePlanMonthlyInvestProfit($allInvestments, $getUserFirstInvestment->plan_start_date, $month  );
                    }
                }else{
                    $chartData[] = array(null);
                }
            }else{
                $chartData[] = array(date("F"), (int)$getUserFirstInvestment->amount);
            }
        }else{
            $chartData = array( array('Month', 'No Investment'), array(date("F"), 0) );
        }
        //dd($chartData);
        return  json_encode($chartData);
    }
    /*
	|--------------
	| Description : this will return all plan name
	| @prams	  : $investData array
	| @return     : array
	|--------------
    */
    public function calculatePlanMonthlyInvestProfit($allInvestments, $firstInvestmentStartFrom,  $monthYearName )
    {
        $monthlyAllPlanData = array(date('F', strtotime($monthYearName)));
        foreach($allInvestments as $k => $v){
            if($this->isInvestmentExistBetweenStartANDCurrentDate($firstInvestmentStartFrom, $v->plan_start_date, $v->plan_end_date, $monthYearName ))
            {
                if( $this->isMonthLieBetweenInvestmentStartEndDates($v->plan_start_date, $v->plan_end_date, $monthYearName ) )
                {
                    // GET ALL MONTHS OF CURRENT INVESTMENTS 
                    $getTotalMonths = $this->get_months($v->plan_start_date, date("Y-m-d"));
                    if($getTotalMonths)
                    {
                        // SEARCH MONTH IN ALL MONTHS ARRAY
                        $pos = array_search($monthYearName,$getTotalMonths);
                        // REMOVED THE KEY VALUES AFTER RESULT FOUND IN MONTHS ARRAY 
                        $totalMonthsAfterSlice  = array_slice($getTotalMonths,  0,  $pos+1, true);
                        $finalArrayMonth = array_reverse($totalMonthsAfterSlice);
                        $investmentMonthNumber = array_keys($finalArrayMonth);
                        if(count($investmentMonthNumber) == 1 && $investmentMonthNumber[0] == 0 )
                        {
                            $monthlyAllPlanData[] = (int)$v->amount;
                        }else
                        {
                            if($investmentMonthNumber[0] == 0  )
                            {
                                $investmentMonthNumber = array_reverse($investmentMonthNumber);
                            }
                            $monthlyAllPlanData[] = $this->calculateSingleInvestmentProfitByMonth($v, $investmentMonthNumber[0]);
                        }
                    }else{
                        $monthlyAllPlanData[] = (int)$v->amount;
                    }
                }else{
                    $monthlyAllPlanData[] = null;
                }
            }else{
                $monthlyAllPlanData[] = null;
            }
        }
        return $monthlyAllPlanData;
    }
    public function isInvestmentExistBetweenStartANDCurrentDate($firstInvestmentStartDate, $currentInvestmentStartDate, $currentInvestmentEndDate, $loopMonth)
    {
        $investDateBegin = date('Y-m-d', strtotime($firstInvestmentStartDate));
        $currentDate	 = date('Y-m-d', strtotime(date('Y-m-d')));
        $endDay	 		 = date('d', strtotime(date($currentInvestmentEndDate)));
        $loopMonthDate   = date('Y-m-d', strtotime(date($loopMonth.'-'.$endDay)));
        if (($currentInvestmentStartDate >= $investDateBegin) && ($currentInvestmentStartDate <= $currentDate) )
        {
            if( ($loopMonthDate > $currentInvestmentEndDate ) )
            {
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    public function isMonthLieBetweenInvestmentStartEndDates($currentInvestmentStartDate, $currentInvestmentEndDate, $monthYear )
    {
        $investMonth 	= date('Y-m', strtotime($monthYear));
        $startDate 		= date('Y-m', strtotime($currentInvestmentStartDate));
        $endDate 		= date('Y-m', strtotime($currentInvestmentEndDate));
        if (( $investMonth >= $startDate ) && ($investMonth <= $endDate) )
        {
            return true;
        }else{
            return false;
        }
    }
    /*
	|------------
	| Description : It help to calculate Gain Amount based on month
	| @prams	  : $investmentArray array/ $month int ( number of months )
	| @return     : int final gain amount
    */
    public function calculateSingleInvestmentProfitByMonth($investmentArray, $month)
    {
        (int)$feeAmount		= $investmentArray->plan_fee;
        (int)$investedAmount= $investmentArray->amount;
        $intrestAmount 		= $investedAmount * $investmentArray->interest_rate * $month / 100;
        $gainAmount 		= ($investedAmount + $intrestAmount) - $feeAmount ;
        return (int)$gainAmount;
    }
    /*
	|------------
	| Description : this will return all plan name
	| @prams	  : $investData array
	| @return     : array
    */
    public function getUsersPlanName($investData)
    {
        $buff=array('Month');
        if(!empty($investData))
        {
            foreach($investData as $key=>$invest)
            {
                $buff[] = $invest->plan_name;
            }
            return $buff;
        }
    }
    /*
	|------------
	| Description : this will array of month from start date to end date
	| @prams	  : @date1 (start date ) / date2 (end date)
	| @return     : array
    */
    function get_months($date1, $date2) 
    {
        $time1  = strtotime($date1);
        $time2  = strtotime($date2);
        $my     = date('mY', $time2);
        if(date('Y-m',$time1) == date('Y-m',$time2)){
		   return array();
        }
        $months = array(date('Y-m', $time1));
        while($time1 < $time2) 
        {
            $time1 = strtotime(date('Y-m-d', $time1).' +1 month');
            if(date('mY', $time1) != $my && ($time1 < $time2))
            $months[] = date('Y-m', $time1);
        }
        if($date1< $date2)
        {
            $months[] = date('Y-m', $time2);
        }
        return $months;
    }
    public function myAccount()
    {
        if (!empty(Auth::user()->state_id))
        {
            $states = State::find(Auth::user()->state_id);
        } 
        else
        {
            $states = '';
        }
        if (!empty(Auth::user()->city_id))
        {
            $city = City::find(Auth::user()->city_id);
        }
        else
        {
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
