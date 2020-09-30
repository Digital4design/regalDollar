<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\DocumentManagemetModel;
use App\Http\Controllers\Controller;
use App\Models\UserRoleRelation;
use App\Models\InvestmentModel;
use App\Models\FooterContent;
use Illuminate\Http\Request;
use App\Models\FooterModel;
use App\Models\Country;
use App\Models\State;
use App\Models\Plan;
use App\Models\Role;
use Validator;
use App\User;
use Auth;
use Crypt;
use Hash;


class AccountController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        $data['roles'] = Role::get();
        $data['countryData'] = Country::get();
        $data['footerdata'] = $footerdata;
        $data['sectiondata'] = $sectiondata;
        $data['footerContent'] = $footerContent;
        return view('front.users.create-step1', $data);
    }
    public function postCreateStep1(Request $request)
    {
        if ($request->user_id != '') {
            $rules = [
                // 'first_name' => 'required|min:2',
                // 'last_name' => 'required|min:2',
                // 'name' => 'required|unique:users,name,'.$request->user_id,
                // 'email' => 'required|unique:users,email,'.$request->user_id,
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
                // dd($validator);
                return back()->withErrors($validator)->withInput();
            }
            try {
                $userData = User::find($request->user_id);
                // $userData->first_name = trim($request->first_name);
                // $userData->last_name = trim($request->last_name);
                // $userData->name = trim($request->name);
                // $userData->email = trim($request->email);
                $userData->is_verify = "pending";
                $userData->save();
                $userData = User::find($request->user_id);
                $userData = $request->session()->put('userData', $userData);
                $userData = $request->session()->get('userData');
                $date = date('Y-m-d');
                $date = strtotime($date);

                Auth::loginUsingId($userData->id);
                $request->session()->put('userData', $userData);

                return redirect('/front/create-step2');
            } catch (\Exception $e) {
                return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
                // echo $e->getMessage();
            }
        } else {
            $rules = [
                'first_name' => 'required|min:2',
                'last_name' => 'required|min:2',
                'name' => 'required|unique:users|max:255',
                'email' => 'required|unique:users|max:255',
                'password'         => 'required',
                'password_confirmation' => 'required|same:password'
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
                $referralCode = $this->generateReferralCode();
                // $planData = Plan::find($request->plan_id);
                // $date = $planData['plan_valid_from'];
                // $date = date('Y-m-d');
                // $date = strtotime($date);
                // $new_date = strtotime('+ ' . $planData["time_investment"] . ' month', $date);
                // $valid_till = date('Y-m-d', $new_date);
                $userData = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'name' => $request->name,
                    'email' => $request->email,
                    'country_citizenship' => $request->country_citizenship,
                    'country_residence' => $request->country_residence,
                    'password' => Hash::make($request->password),
                    'ref_code' => $referralCode,
                    'ref_by' => $request->ref_by ?? null,
                    'is_verify' => "pending",
                ]);
                if ($userData instanceof MustVerifyEmail) {
                    $userData->sendEmailVerificationNotification();
                }

                // $InvestmentData = InvestmentModel::create([
                //     'user_id' => $userData->id,
                //     'plan_id' => $request->plan_id,
                //     'plan_start_date' => date('Y-m-d'),
                //     'plan_end_date' => $valid_till,
                // ]);
                $roleArray = array(
                    'user_id' => $userData->id,
                    'role_id' => 2, // customer role Id
                );
                UserRoleRelation::insert($roleArray);
                // $userData['plan_id'] = $request->plan_id;
                // $userData['investmentId'] = $InvestmentData['id'];
                Auth::loginUsingId($userData->id);
                $request->session()->put('userData', $userData);
                return redirect('/email/verify');
            } catch (\Exception $e) {
                return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            }
        }
    }
    public function updateUserData(Request $request)
    {
        $userData = User::find($request->userid);
        if ($request->first_name) {
            $userData->first_name = $request->first_name;
        }
        if ($request->address) {
            $userData->address = $request->address;
        }
        if ($request->city) {
            $userData->city = $request->city;
        }
        if ($request->state) {
            $userData->state = $request->state;
        }
        if ($request->zipcode) {
            $userData->zipcode = $request->zipcode;
        }
        if ($request->phoneNumber) {
            $userData->phoneNumber = $request->phoneNumber;
        }
        $userData->save();
        $userData = User::find($request->userid);
        echo json_encode(array('status' => 'success', 'data' => $userData));
    }
    public function createStep2(Request $request)
    {
        $userData = $request->session()->get('userData');

        $userData = User::find(Auth::user()->id);
        $userData->is_verify = "done";
        $userData->save();
        $userData = $request->session()->get('userData');
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();

        $data['countryData'] = Country::get();
        $data['footerdata'] = $footerdata;
        $data['sectiondata'] = $sectiondata;
        $data['footerContent'] = $footerContent;
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
        // dd($validator);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $userData = User::find($request->user_id);
            $userData->accountType = trim($request->accountType);
            $userData->save();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData['status'] = 'success';
            $userData = $request->session()->put('userData', $userData);
            $userData['userData'] = $request->session()->get('userData');
            $userData['stateData'] = State::where('country_id', '231')->get();
            $footerdata = FooterModel::get();
            $sectiondata =  FooterModel::select('section')->distinct()->get();
            $footerContent = FooterContent::get()->toArray();
            // return response()->json($userData);
            // dd($userData);
            return view('front.users.create-step3', $userData);
        } catch (\Exception $e) {
            //$userData['status']='danger';
            //return response()->json($userData);
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
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
            $userData['investmentId'] = $request->investmentId;
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $data['userData'] = $userData;
            $data['countryData'] = Country::get();
            $data['stateData'] = State::where('country_id', '231')->get();
            return view('front.users.create-step4', $data);
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            // echo $e->getMessage();
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
            InvestmentModel::where('id', $request->investmentId)->update(['amount' => $request->amount,]);
            $investmentData = InvestmentModel::where('id', $request->investmentId)->get();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::where('plan_id', $request->plan_id)->get();
            // dd($documentData);
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
            $data['investmentData'] = $investmentData;
            // dd($data);
            return view('front.users.create-step5', $data);
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
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
            if ($request->signature) {
                $imagedata = base64_decode($request->signature);
                $filename = md5(date("dmYhisA"));
                $file_path = 'public/uploads/signature' . '/' . $filename . '.png';
                file_put_contents($file_path, $imagedata);
            }
            $indicate = json_encode($request->indicateagreement);
            $userData = User::find($request->user_id);
            $investmentData = InvestmentModel::find($request->investmentId);

            $investmentData->indicateagreement = $indicate;
            $investmentData->reinvestment = $request->reinvestment;
            if ($request->signature) {
                $investmentData->signature = $filename . '.png';
            }
            $investmentData->save();
            $investmentData = InvestmentModel::find($request->investmentId);
            // dd($investmentData);
            $userData = User::find($request->user_id);
            $data['investmentData'] = $investmentData;
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::where('plan_id', $request->plan_id)->get();
            $data['planData'] = Plan::where('id', $userData['plan_id'])->first();
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
            return view('front.users.create-step6', $data);
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            echo $e->getMessage();
        }
    }
    public function updateAgreements(Request $request)
    {
        $userData = User::find($request->user_id);
        $investData = InvestmentModel::where('id', $request->investmentId)->first();
        $userData['investmentId']   = $request->investmentId;
        $userData['plan_id']        = $request->plan_id;
        $userData['amount']         = $investData['amount'];
        $userData                   = $request->session()->put('userData', $userData);
        $userData                   = $request->session()->get('userData');
        $data['userData']           = $userData;
        return view('front.users.payment', $data);
    }

    public function generateReferralCode()
    {
        $acceptablePasswordChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $generateCode = "";
        for ($i = 0; $i < 6; $i++) {
            // for generate password
            $generateCode .= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1), 1);
        }
        // dd($generateCode);
        //$generateCode = rand(1000, 9999);
        $referralCode = User::where('ref_code', $generateCode)->get()->toArray();
        if (count($referralCode) > 0) {
            return $this->generateReferralCode();
        } else {
            return $generateCode;
        }
    }
}
