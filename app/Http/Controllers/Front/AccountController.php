<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DocumentManagemetModel;
use App\Models\Plan;
use App\Models\Role;
use App\Models\State;
use App\Models\UserRoleRelation;
use App\Models\InvestmentModel;
use App\User;
use Auth;
use Crypt;
use Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;

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
        $valid_till = date('Y-m-d', $new_date);
        $data['roles'] = Role::get();
        $data['countryData'] = Country::get();
        $data['userData'] = $userData;
        $data['planData'] = $planData;
        $data['valid_till'] = $valid_till;
        return view('front.users.create-step1', $data);
    }
    public function postCreateStep1(Request $request)
    {
        if ($request->user_id != '') {
            $rules = [
                'first_name' => 'required|min:2',
                'last_name' => 'required|min:2',
                'name' => 'required',
                'email' => 'required',
            ];
            $messages = [
                'first_name.required' => 'Your first name is required.',
                'first_name.min' => 'first name should contain at least 2 characters.',
                'last_name.required' => 'Your first name is required.',
                'last_name.min' => 'last name should contain at least 2 characters.',
                'name.required' => 'User name is required.',
                'email.required' => 'email is required.',                
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            try {
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
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $rules = [
                'first_name' => 'required|min:2',
                'last_name' => 'required|min:2',
                'name' => 'required',
                'email' => 'required',
            ];
            $messages = [
                'first_name.required' => 'Your first name is required.',
                'first_name.min' => 'first name should contain at least 2 characters.',
                'last_name.required' => 'Your first name is required.',
                'last_name.min' => 'last name should contain at least 2 characters.',
                'name.required' => 'User name is required.',
                'email.required' => 'email is required.',
                //'last_name.min' => 'First name should contain at least 2 characters.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            try {

                $planData = Plan::find($request->plan_id);
                $date = $planData['plan_valid_from'];
                $date = strtotime($date);
                $new_date = strtotime('+ ' . $planData["time_investment"] . ' month', $date);
                $valid_till = date('Y-m-d', $new_date);
                
                $userData = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'name' => $request->name,
                    'email' => $request->email,
                    'country_citizenship' => $request->country_citizenship,
                    'country_residence' => $request->country_residence,
                    'password' => Hash::make($request->password),
                ]);
                InvestmentModel::create([
                    'user_id' => $userData->id,
                    'plan_id' => $request->plan_id,
                    'plan_start_date'=>$planData['plan_valid_from'],
                    'plan_end_date'=>$valid_till,
                ]);
                $roleArray = array(
                    'user_id' => $userData->id,
                    'role_id' => 2, // customer role Id
                );
                UserRoleRelation::insert($roleArray);
                $userData['plan_id']=$request->plan_id;
                // dd($userData);
                // DB::table('role_user')->insert($roleArray);
                Auth::loginUsingId($userData->id);
                $request->session()->put('userData', $userData);
                return redirect('/front/create-step2');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function createStep2(Request $request)
    {
        $userData = $request->session()->get('userData');
        // $userData = User::find($userData->id);
        // $userData = $request->session()->put('userData', $userData);
        // $userData = $request->session()->get('userData');
        // dd($userData);
        return view('front.users.create-step2', compact('userData', $userData));
    }
    public function postCreateUpdate(Request $request)
    {
        $rules = [
            'accountType' => 'required',
        ];
        $messages = [
            'accountType.required' => 'Account Type is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $userData = User::find($request->user_id);
            $userData->accountType = trim($request->accountType);
            $userData->save();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData = $request->session()->put('userData', $userData);
            $userData['userData'] = $request->session()->get('userData');
            $userData['stateData'] = State::where('country_id', '231')->get();
            // dd($userData);
            return view('front.users.create-step3', $userData);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function postInfoUpdate(Request $request)
    {
        // dd( $request->all());
        $rules = [
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'phoneNumber' => 'required',
            'birthday' => 'required',
            'social_security_number' => 'required',
        ];
        $messages = [
            'address.required' => 'address is required.',
            'address2.required' => 'address2 is required.',
            'city.required' => 'city is required.',
            'state.required' => 'state is required.',
            'zipcode.required' => 'zipcode is required.',
            'phoneNumber.required' => 'phoneNumber is required.',
            'birthday.required' => 'birthday is required.',
            'social_security_number.required' => 'social_security_number is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $userData = User::find($request->user_id);
            $userData->address = trim($request->address);
            $userData->address2 = trim($request->address2);
            $userData->city = trim($request->city);
            $userData->state = trim($request->state);
            $userData->zipcode = trim($request->zipcode);
            $userData->phoneNumber = trim($request->phoneNumber);
            $userData->birthday = trim($request->birthday);
            // $userData->city = trim($request->city);
            $userData->social_security_number = trim($request->social_security_number);
            $userData->save();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $data['userData'] = $userData;
            $data['countryData'] = Country::get();
            $data['stateData'] = State::where('country_id', '231')->get();
            return view('front.users.create-step4', $data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function postAmountUpdate(Request $request)
    {
        $rules = [
            'amount' => 'required',
        ];
        $messages = [
            'amount.required' => 'amount is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            InvestmentModel::where('user_id',$request->user_id)->where('plan_id',$request->plan_id)->update(
                [
                    'amount' => $request->amount,
                ]);
            // $investData = InvestmentModel::where('user_id',$request->user_id)->where('plan_id',$request->plan_id)->first();
            // dd($investData);
            // $userData = User::find($investData->id);
            // dd($userData);
            // $userData->amount = trim($request->amount);
            // $userData->save();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::get();
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
            return view('front.users.create-step5', $data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function postDocsUpdate(Request $request)
    {
        $rules = [
            'indicateagreement' => 'required',
            'reinvestment' => 'required',
        ];
        $messages = [
            'indicateagreement.required' => 'amount is required.',
            'reinvestment.required' => 'amount is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $indicate = json_encode($request->indicateagreement);
            $userData = User::find($request->user_id);
            $userData->indicateagreement = $indicate;
            $userData->reinvestment = $request->reinvestment;
            $userData->save();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::get();
            $data['planData'] = Plan::where('id',$userData['plan_id'])->first();
            // dd($data['planData']);
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
            return view('front.users.create-step6', $data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function updateAgreements(Request $request)
    {
        $userData = User::find($request->user_id);
        $investData = InvestmentModel::where('user_id',$request->user_id)->where('plan_id',$request->plan_id)->first();
        // dd($investData['amount']);
        $userData['plan_id'] = $request->plan_id;
        $userData['amount'] = $investData['amount'];
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        $data['userData'] = $userData;
        return view('front.users.payment', $data);
        //dd($userData);
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
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
   public function destroy($id)
    {
        //
    }
}
