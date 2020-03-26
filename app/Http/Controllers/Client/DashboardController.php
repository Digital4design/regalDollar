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
        //dd(Auth::user()->id);
        $user_id = Auth::user()->id;
        $investmentData = InvestmentModel::where('user_id',$user_id)->first();
        $plan_id = $investmentData['plan_id'];
        $planData = Plan::where('id',$plan_id)->first();
        // dd($planData);
        $result = array('pageName' => 'Dashboard',
            'activeMenu' => 'dashboard',
            'activePlan' => $planData,
            'investAmount' => $investmentData['amount'],
            'matureDate' => $investmentData['plan_end_date'],
        );
        return view('client.dashboard.dashboard', $result);
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

    public function myAccount()
    {
        //dd(Auth::user());
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
            // 'info_state' => 'required|numeric',
            // 'info_city' => 'required|numeric',
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
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
