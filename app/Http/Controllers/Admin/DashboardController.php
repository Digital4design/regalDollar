<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvestmentModel;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Plan;
use App\User;
use DataTables;
use Carbon\Carbon;
use Crypt;
use Validator;
use DateTime;
use Auth;
use Hash;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Dashboard landing function
     *
     * @return void
     */
    public function index()
    {
        $investData = DB::table('investment')
            ->select('investment.*', 'plans.interest_rate', 'plans.plan_name', 'plans.time_investment', 'plans.plan_fee', 'users.name')
            //->select('investment.*','plans.plan_name','users.name')
            ->join('plans', 'plans.id', '=', 'investment.plan_id')
            ->join('users', 'users.id', '=', 'investment.user_id')
            ->where('investment.amount', '!=', '')
            ->where('investment.paypal_transaction_id', '!=', '')
            //->where(['investment.user_id' => $user_id])
            ->get();

        $totalgain = 0;
        foreach ($investData as $invest) {

            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($invest->plan_start_date);
            $interval = $datetime1->diff($datetime2);

            $fee = $invest->plan_fee;
            $amount = $invest->amount;
            $totalgain += $amount;
        }
        $chartData = $this->getDashboardGraphData();
        $result = array(
            'pageName'         => 'Dashboard',
            'activeMenu'    => 'dashboard',
            'investData'    => $investData,
            'totalgain'        => $totalgain,
            'chartData'     => $chartData,

        );
        return view('admin.dashboard.dashboard', $result);
    }

    public function getInvestmentData()
    {



        $investData = DB::table('investment')
            ->select('investment.*', 'plans.interest_rate', 'plans.plan_name', 'plans.time_investment', 'plans.plan_fee', 'users.name')
            ->join('plans', 'plans.id', '=', 'investment.plan_id')
            ->join('users', 'users.id', '=', 'investment.user_id')
            ->where('investment.amount', '!=', '')
            ->where('investment.paypal_transaction_id', '!=', '')
            ->get();
        $newData = array();
        foreach ($investData as $investment) {
            $date = date_create(date($investment->created_at));
            $secendDate = date_format($date, "M d,Y");
            $mData =  date_format($date, "M");
            $investment->created_at = $secendDate;
            $investment->type = '<div>Monthly Dividend (' . $mData . ')<i class="fa fa-arrow-alt-circle-right"></i></div>';
            array_push($newData, $investment);
        }
        return Datatables::of($newData)
            ->addColumn('action', function ($newData) {
                return '<a href ="' . url('/admin/dashboard-investment-management/view') . '/' . $newData->id . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Investment Growth</a>';
            })->make(true);
    }

    public function getInvestmentSingle($invest_id)
    {
        // $investdata = InvestmentModel::where('user_id',16)->select('plan_id')->get();

        // dd($investdata);
        $investData = DB::table('investment')
            ->select('investment.*', 'plans.interest_rate', 'plans.plan_name', 'plans.time_investment', 'plans.plan_fee', 'users.name')
            //->select('investment.*','plans.plan_name','users.name')
            ->join('plans', 'plans.id', '=', 'investment.plan_id')
            ->join('users', 'users.id', '=', 'investment.user_id')
            ->where('investment.amount', '!=', '')
            ->where('investment.paypal_transaction_id', '!=', '')
            ->where(['investment.id' => $invest_id])
            ->get();
        $totalgain = 0;
        $newArray[] = array();
        foreach ($investData  as $key => $invest) {
            //dd($invest);
            $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($invest->plan_start_date);
            $interval = $datetime1->diff($datetime2);
            $yearTomont = $interval->y * 12;
            $totalMonth = $yearTomont + $interval->m;
            

            $fee = $invest->plan_fee;
            $amount = $invest->amount;
            for ($i = 1; $i <= $totalMonth; $i++) {
                if ($i < 1) {
                    $totalgain += $amount;
                    $dt = strtotime($invest->plan_start_date);
                    $month = date("M-Y", strtotime("+" . $i . " month", $dt));
                } else {
                    $instr = $amount * $invest->interest_rate / $i;
                    $gain = $amount + $instr;
                    $totalgain += $gain - $fee;
                    $date = strtotime($invest->plan_start_date);
                    $month = date("M/Y", strtotime("+" . $i . " month", $date));
                }
                $newArray[$i] = [
                    'month' => $month,
                    'gowth' => $totalgain
                ];
            }
        }
        
        $newMonth = array();
        foreach ($newArray as $array) {
            if ($array != []) {
                array_push($newMonth, $array);
            }
        }
        //dd($newMonth);
        $result = array(
            'pageName'         => 'Investment Growth',
            'activeMenu'    => 'dashboard',
            'growthData' => $newMonth

        );
        return view('admin.dashboard.growth', $result);
    }

    /*
	|------------
	| Description : this is help to generate graph data array
	| @prams	  : 
	| @return     : full complete array
	*/


    public function getDashboardGraphData()
    {
        // set month and plan name in array
        $chartData[] = $onlyPlans =  $this->getALLPlanName();
        // get user first investment 
        $getUserFirstInvestment = InvestmentModel::where('investment.paypal_transaction_id', '!=', '')
            ->orderBy('investment.plan_start_date', 'Asc')
            ->first();
        if ($getUserFirstInvestment) {
            $allMonths = $this->get_months($getUserFirstInvestment->plan_start_date, date("Y-m-d"));
            // get total months
            if (count($allMonths) > 0) {
                foreach ($allMonths as $month) {
                    $chartData[] = $this->calculatePlansMonthlySale($month);
                }
            } else {
                $chartData[] = array(date("F"), 0);
            }
        } else {
            $chartData[] = array(array(date("F"), 0, 0, 0, 0));
        }
        //dd($chartData);
        return  json_encode($chartData);
    }

    /*
	|------------
	| Description : help to set chart array based on month and all plans 
	| @prams	  : @monthYear 2020-march
	| @return     : monthly array
	*/

    public function calculatePlansMonthlySale($monthYear)
    {
        $monthlyAllPlanData = array(date('F', strtotime($monthYear)));
        $getAllAdminPlans  = Plan::orderBy('plan_name', 'Asc')->get();
        if ($getAllAdminPlans) {
            foreach ($getAllAdminPlans as $key => $pValue) {
                $monthlyAllPlanData[] =    $this->calculatePlanSaleData($pValue, $monthYear);
            }
        } else {
            $monthlyAllPlanData[] = null;
        }
        return $monthlyAllPlanData;
    }

    /*
	|------------
	| Description : this will return the sale calculations
	| @prams	  : $plan array, @monthYear 2020-march
	| @return     : count
	*/

    public function calculatePlanSaleData($plan,  $monthYear)
    {
        $fromMonth = array(date('m', strtotime($monthYear)));
        $getSale = InvestmentModel::where('plan_id', $plan->id)
            ->whereNotNull('paypal_transaction_id')
            ->whereMonth('plan_start_date', $fromMonth)
            ->count();
        return (int)$getSale;
    }


    /*
	|------------
	| Description : this will return all plan name
	| @prams	  : $investData array
	| @return     : array
	*/

    public function getALLPlanName()
    {
        $buff = array('Month');
        $getAllPlans = Plan::orderBy('plan_name', 'Asc')
            ->get();
        if (!empty($getAllPlans)) {
            foreach ($getAllPlans as $p) {
                $buff[] = $p->plan_name;
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
        if (date('Y-m', $time1) == date('Y-m', $time2)) {
            return array(date('Y-m', $time1));
        }
        $months = array(date('Y-m', $time1));
        while ($time1 < $time2) {
            $time1 = strtotime(date('Y-m-d', $time1) . ' +1 month');
            if (date('mY', $time1) != $my && ($time1 < $time2))
                $months[] = date('Y-m', $time1);
        }
        if ($date1 < $date2) {
            $months[] = date('Y-m', $time2);
        }
        return $months;
    }





    /**
     * myAccount function
     *
     * @return void
     */
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
        return view('admin.dashboard.profile', compact('vars', 'states', 'city'));
    }
    /**
     * State acc to countryid function
     *
     * @return void
     */
    public function states(Request $request)
    {
        $vars = State::where(['country_id' => $request->country_id])->select('id', 'name')->get();
        echo json_encode(array('status' => 1, 'data' => $vars));
        die;
    }

    public function getSelectClientPlan(Request $request)
    {

        //$vars = InvestmentModel::where(['user_id' => $request->client_id])->select('user_id', 'plan_id')->get();
        $investmentData = InvestmentModel::where(['user_id' => $request->client_id])->select('plan_id')->get();
        $planes_id = array();
        foreach ($investmentData as $investment) {
            array_push($planes_id, $investment['plan_id']);
        }
        $planes = array_unique($planes_id);
        $plan_id =  implode(',', $planes);

        $planData = Plan::whereIn('id', [$plan_id])->select('id', 'plan_name')->get();
        echo json_encode(array('status' => 1, 'data' => $planData));
        die;
    }
    /**
     * City acc to State function
     *
     * @return void
     */
    public function cities(Request $request)
    {
        $vars = City::where(['state_id' => $request->id])->select('id', 'name')->get();
        echo json_encode(array('status' => 1, 'data' => $vars));
        die;
    }
    /**
     * myAccount function
     *
     * @return void
     */
    public function editAccount(Request $request)
    {
        $rules = [
            'first_name' => 'required|min:2|regex:/^[A-Za-z. -]+$/',
            'last_name' => 'required|min:2|regex:/^[A-Za-z. -]+$/',
            'info_country' => 'required|numeric',
            'info_state' => 'required|numeric',
            'info_city' => 'required|numeric',
            'zipcode' => 'required|numeric',
        ];
        $messages = [
            'firstName.required' => 'Your first name is required.',
            'firstName.min' => 'First name should contain at least 2 characters.',
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
            $user->country_id = trim($request->info_country);
            $user->state_id = trim($request->info_state);
            $user->city_id = trim($request->info_city);
            $user->zipcode = trim($request->zipcode);
            $user->save();
            return redirect('/admin/account')->with(['pstatus' => 'success', 'pmessage' => 'your details updated successfully!']);
        } catch (\Exception $e) {
            return back()->with(['pstatus' => 'danger', 'pmessage' => $e->getMessage()]);
        }
    }
    /**
     * editAccountPassword for update new password
     *
     * @return true / false
     */
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
                return redirect('/admin/account')->with(['status' => 'success', 'message' => 'your password updated successfully!']);
            } else {
                return back()->with(['status' => 'danger', 'message' => 'current password not match with our record, please try again.']);
            }
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }
    public function caculateCompoundInterest()
    {
        $investmentData = InvestmentModel::where(['user_id' => 63])->select('plan_id')->get();
        $planes_id = array();
        foreach ($investmentData as $investment) {
            array_push($planes_id, $investment['plan_id']);
        }
        $planes = array_unique($planes_id);
        $plan_id[] =  implode(',', $planes);

        $planData = Plan::whereIn('id', [$plan_id])->select('id', 'plan_name')->get();

        dd($planData);
    }

    function caculateCompoundInterest45($investment, $year, $rate = 20, $n = 1)
    {
        $Present_Value = 1400;
        $Int_Rate = 8;
        $Num_Periods = 21;

        $Future_Value = round($Present_Value * pow(1 + ($Int_Rate / 100), $Num_Periods), 2);
        echo "$Present_Value @ $Int_Rate % over $Num_Periods periods becomes $Future_Value";
    }
}
