<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DocumentManagemetModel;
use App\Models\InvestmentModel;
use App\Models\Plan;
use App\Models\State;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;

class UserInvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep2(Request $request)
    {
        $sessionData=$request->session()->get('userData');
        // dd($userData);
        if(isset($sessionData->plan_id) && isset($sessionData->investmentId) && isset($sessionData->id)){
            $userData = User::find($sessionData->id);
            $userData['investmentId']=$sessionData->investmentId;
            $userData['plan_id']=$sessionData->plan_id;
            $userData['paypal_transaction_id']='';
            $userData['amount']='';
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            // dd($userData);
            return view('front.users.create-step2', compact('userData', $userData));
        }else{
            return view('pages-404');
        } 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $userData = User::find(Auth::user()->id);
            $userData->steps_done='2';
            $userData->is_verify = "done";
            $userData->save();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData['user_id'] = Auth::user()->id;
            $userData['investmentId'] = $request->investmentId;
            $userData['stateData'] = State::where('country_id', '231')->get();
            $userData['paypal_transaction_id']='';
            $userData['amount']='';
            $userData = $request->session()->put('userData', $userData);
            $userData['userData'] = $request->session()->get('userData');
            $userData['status'] = 'success';
            return Redirect::to('/investment/create-step3');
            // return response()->json($userData);
            // dd($userData);
            // return view('front.users.create-step3', $userData);
        } catch (\Exception $e) {
            // $userData['status'] = 'danger';
            // return response()->json($userData);
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            // echo $e->getMessage();
        }
    }
    public function createStep3(Request $request)
    {
        $sessionData=$request->session()->get('userData');
        if(isset($sessionData->plan_id) && isset($sessionData->investmentId) && isset($sessionData->id)){
            $userData = User::find($sessionData->id);
            $userData['investmentId']=$sessionData->investmentId;
            $userData['plan_id']=$sessionData->plan_id;
            $userData['stateData'] = State::where('country_id', '231')->get();
            $userData = $request->session()->put('userData', $userData);
            $userData['userData'] = $request->session()->get('userData');
            // dd($userData);
            return view('front.users.create-step3', $userData);
        }else{
            return view('pages-404');
        }        
    }

    public function updateAddress(Request $request)
    {
       // dd($request->all());
        $rules = [
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'phoneNumber' => 'required',
            'birthday' => 'required|date',
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
            //return response()->json(['status' => 'error', 'validationError' => $validator->errors()]);
            return back()->withErrors($validator)->withInput();
        }
        try {
            $userData = User::find($request->user_id);
            $userData->address = $request->address;
            $userData->address2 =$request->address2;
            $userData->city = $request->city;
            $userData->state = $request->state;
            $userData->zipcode = $request->zipcode;
            $userData->phoneNumber = $request->phoneNumber;
            $userData->birthday = $request->birthday;
            $userData->social_security_number = $request->social_security_number;
            $userData->save();

            $userData = User::find($request->user_id);
            // dd($userData);
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData['userData'] = $userData;
            $userData['paypal_transaction_id']='';
            $userData['amount']='';
            $userData = $request->session()->get('userData');
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $userData['countryData'] = Country::get();
            $userData['stateData'] = State::where('country_id', '231')->get();
            $userData['status'] = 'success';
            // dd($userData);
            return Redirect::to('/investment/create-step4');
            // dd($userData);
            // return response()->json($userData);
            // return view('front.users.create-step4', $data);
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            // echo $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createStep4(Request $request)
    {
        $sessionData=$request->session()->get('userData');
        // dd($sessionData);
        if(isset($sessionData->plan_id) && isset($sessionData->investmentId) && isset($sessionData->id)){
            $data['userData'] = User::find($sessionData->id);
            $data['countryData'] = Country::get();
            $data['stateData'] = State::where('country_id', '231')->get();
            return view('front.users.create-step4', $data);
        }else{
            return view('pages-404');
        }
    }

    public function updateAmount(Request $request)
    {
        $rules = [
            'finalamount' => 'required',
            //'amount' => 'required',
        ];
        $messages = [
            'finalamount.required' => 'amount is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            //return response()->json(['status' => 'error', 'validationError' => $validator->errors()]);
             return back()->withErrors($validator)->withInput();
        }
        try {
            InvestmentModel::where('id', $request->investmentId)->update(['amount' => $request->finalamount]);
            $investmentData = InvestmentModel::where('id', $request->investmentId)->get();
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::where('plan_id', $request->plan_id)->get();
            $userData['userData'] = $userData;
            $userData['documentData'] = $documentData;
            $userData['investmentData'] = $investmentData;
            $userData['status'] = 'success';
            return Redirect::to('/investment/create-step5');
            // return response()->json($userData);
            
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            // echo $e->getMessage();
        }
    }

    public function paymentProcess($paymentId, $amount,Request $request)
    {
        //dd($paymentId);
        $userData = User::find(Auth::user()->id);
        $userData = $request->session()->get('userData');
        // dd($userData); // working here
        InvestmentModel::where('id',$userData['investmentId'])
            //->where('plan_id',$userData['plan_id'])
            ->update(
                [
                    'amount'=>$amount,
                    'paypal_transaction_id' => $paymentId,
                ]);
        $invest = InvestmentModel::where('id',$userData['investmentId'])->first();
        $userData = User::find(Auth::user()->id);
        $userData = $request->session()->get('userData');
        $userData['paypal_transaction_id']=$paymentId;
        $userData['amount']=$amount;
        $userData['investmentId']=$userData['investmentId'];
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        if($paymentId){
            return Redirect::to('/investment/create-step5');
        }else{
            return Redirect::to('/investment/create-step4');
        }
        
        return redirect('/client');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createStep5(Request $request)
    {
        $userData=$request->session()->get('userData');
        //dd($userData);
        if(isset($userData->plan_id) && isset($userData->investmentId) && isset($userData->id)){
            $investmentData = InvestmentModel::where('id', $userData['investmentId'])->get();
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::where('plan_id', $userData['plan_id'])->get();
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
            $data['investmentData'] = $investmentData;
            return view('front.users.create-step5', $data);
        }else{
            return view('pages-404');
        }       
    }

    public function updateSignature(Request $request){
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
                $investmentData->signature = $filename .'.png';
            }
            $investmentData->save();
            $investmentData = InvestmentModel::find($request->investmentId);
            //dd($investmentData['paypal_transaction_id']);
            $userData = User::find($request->user_id);
            $data['investmentData'] = $investmentData;
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData['paypal_transaction_id'] = $investmentData['paypal_transaction_id'];
            $userData['amount'] = $investmentData['amount'];
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            // dd($userData);
            $documentData = DocumentManagemetModel::where('plan_id', $request->plan_id)->get();
            $data['planData'] = Plan::where('id', $userData['plan_id'])->first();
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
            return Redirect::to('/investment/create-step6');
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            // echo $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createStep6(Request $request)
    {
        $userData=$request->session()->get('userData');
        if(isset($userData->plan_id) && isset($userData->investmentId) && isset($userData->id)){
            $plan_id = $userData->plan_id;
            $investmentId = $userData->investmentId;
            $userData = User::find($userData->id);
            $userData['plan_id'] = $plan_id;
            $userData['investmentId'] = $investmentId;
            $userData['planData'] = Plan::where('id',$plan_id)->first();
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::where('plan_id', $plan_id)->get();
            $userData['investmentData']  = InvestmentModel::where('id',$investmentId)->first();
            $userData['planData'] = Plan::where('id',$plan_id)->first();
            $userData['userData'] = $userData;
            $userData['documentData'] = $documentData;
            return view('front.users.create-step6', $userData);
        }else{
            return view('pages-404');
        } 
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAgreements(Request $request)
    {
        $userData = User::find($request->user_id);
        $investData = InvestmentModel::where('id', $request->investmentId)->first();
        $userData['investmentId'] = $request->investmentId;
        $userData['plan_id'] = $request->plan_id;
        $userData['amount'] = $investData['amount'];
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        $data['userData'] = $userData;
        return redirect('/client');
        return view('front.users.payment', $data);
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