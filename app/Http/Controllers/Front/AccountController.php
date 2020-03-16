<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Plan;
use App\Models\Role;
use App\Models\State;
use App\User;
use Crypt;
use DB;
use Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    use RegistersUsers;

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        $userData = $request->session()->get('userData');
        if ($userData) {
            $userData = User::find($userData->id);
        } else {
            $userData = array();
        }
        $data['result'] = array(
            'pageName' => 'User Listing',
            'activeMenu' => 'user-management',
        );
        $planData = Plan::find(Crypt::decrypt($id));
        $date = $planData->plan_start_date;
        $date = strtotime($date);
        $new_date = strtotime('+ ' . $planData->time_investment . ' month', $date);
        $valid_till = date('d-m-Y', $new_date);
        $data['roles'] = Role::get();
        $data['userData'] = $userData;
        $data['planData'] = $planData;
        $data['valid_till'] = $valid_till;
        return view('front.users.create-step1', $data);
    }
    public function postCreateStep1(Request $request)
    {
        //dd($request->all());
        if ($request->user_id != '') {
            $userData = User::find($request->user_id);
            $userData->first_name = trim($request->first_name);
            $userData->last_name = trim($request->last_name);
            $userData->name = trim($request->name);
            $userData->email = trim($request->email);
            $userData->save();
            $userData = User::find($request->user_id);
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            return redirect('/front/create-step2');
        } else {
            // $rules = [
            //     'first_name' => 'required|min:2',
            //     'last_name' => 'required|min:2',
            //     'name' => 'required',
            //     'email' => 'required',
            // ];
            // $messages = [
            //     'first_name.required' => 'Your first name is required.',
            //     'first_name.min' => 'First name should contain at least 2 characters.',
            // ];
            // $validator = Validator::make($request->all(), $rules, $messages);
            // if ($validator->fails()) {
            //     return back()->withErrors($validator)->withInput();
            // }

            $userData = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->name,
                'email' => $request->email,
                'plan_id' => $request->plan_id,
                'plan_start_date' => $request->plan_start_date,
                'plan_end_date' => $request->plan_end_date,
                'password' => Hash::make($request->password),

            ]);
            $roleArray = array(
                'user_id' => $userData->id,
                'role_id' => 2, // customer role Id
            );
            DB::table('role_user')->insert($roleArray);
            Auth::loginUsingId($userData->id);

            $request->session()->put('userData', $userData);
            return redirect('/front/create-step2');
        }
    }
    public function createStep2(Request $request)
    {
        $userData = $request->session()->get('userData');
        $userData = User::find($userData->id);
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        return view('front.users.create-step2', compact('userData', $userData));
    }
    public function postCreateUpdate(Request $request)
    {
        $userData = User::find($request->user_id);
        $userData->accountType = trim($request->accountType);
        $userData->save();
        $userData = User::find($request->user_id);
        $userData = $request->session()->put('userData', $userData);
        $userData['userData'] = $request->session()->get('userData');
        $userData['stateData'] = State::where('country_id', '231')->get();
        return view('front.users.create-step3',  $userData);
    }
    public function postInfoUpdate(Request $request)
    {
        $userData = User::find($request->user_id);
        $userData->address = trim($request->address);
        $userData->address2 = trim($request->address2);
        $userData->zipcode = trim($request->zipcode);
        $userData->phoneNumber = trim($request->phoneNumber);

        // $userData->country = trim($request->country);
        // $userData->city = trim($request->city);
        // $userData->SSN = trim($request->SSN);
        $userData->save();
        $userData = User::find($request->user_id);
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        $data['userData'] = $userData;
        $data['countryData'] = Country::get();
        $data['stateData'] = State::where('country_id', '231')->get();
        return view('front.users.create-step3', $data);
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
