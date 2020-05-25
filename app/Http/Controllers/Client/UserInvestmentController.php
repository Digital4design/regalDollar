<?php

namespace App\Http\Controllers\Client;

use App\Notifications\Users\InvestmentConformationMail;
use App\Models\DocumentManagemetModel;
use App\Http\Controllers\Controller;
use App\Models\InvestmentModel;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Plan;
use Validator;
use Redirect;
use App\User;
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
        $userData=$request->session()->get('userData');
        if(isset($userData->plan_id) && isset($userData->investmentId) && isset($userData->id)){
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
       // dd($request->all());
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
            $userData->accountType = $request->accountType;
            $userData->is_verify = "done";
            $userData->steps_done = "2";
            $userData->save();

            $sessionData = $request->session()->get('userData');
            //dd($sessionData['investmentId']);
            
            //dd( $userData['userData']);
            $userData = User::find($request->user_id);
            $userData['plan_id'] = $request->plan_id;
            $userData['user_id'] = Auth::user()->id;
            $userData['investmentId'] = $sessionData['investmentId'];
            
            $sessionData['plan_id'] = $request->plan_id;
            $sessionData['user_id'] = Auth::user()->id;
            $sessionData['investmentId'] = $sessionData['investmentId'];

            $sessionData = $request->session()->put('sessionData', $sessionData);

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
        //dd($sessionData);

        if(isset($sessionData->plan_id) && isset($sessionData->investmentId) && isset($sessionData->id)){
            if(is_null(Auth::user()->accountType)){
                return Redirect::to('/investment/create-step2');
            }
            $userData['investmentData'] = InvestmentModel::where('id', $sessionData->investmentId)->first();
            $userData['userData'] = User::where('id', $sessionData->id)->first();
            $userData['stateData'] = State::where('country_id', '231')->get();
            $userData['planData'] = Plan::where('id', $sessionData->plan_id)->first();
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
            $userData->steps_done = "3";
            $userData->save();
            

            $userData = User::find($request->user_id);
           // dd($userData);
            $userData['user_id'] = $request->user_id;
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData['userData'] = $userData;
            //$userData = $request->session()->get('userData');
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
           // dd($userData);

            $userData['planData'] = Plan::where('id', $request->plan_id)->first();
            $userData['userData'] = User::where('id',$request->user_id)->first();
            $userData['countryData'] = Country::get();
            $userData['stateData'] = State::where('country_id', '231')->get();
            return Redirect::to('/investment/create-step4');
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
        if(isset($sessionData->plan_id) && isset($sessionData['investmentId']) && isset($sessionData->id)){
            if(is_null(Auth::user()->address) 
            || is_null(Auth::user()->address2) 
            || is_null(Auth::user()->city) 
            || is_null(Auth::user()->state) 
            || is_null(Auth::user()->zipcode)
            || is_null(Auth::user()->phoneNumber)
            || is_null(Auth::user()->social_security_number)
            || is_null(Auth::user()->birthday)
            ){
                return Redirect::to('/investment/create-step3');
            }
            $data['investmentData'] = InvestmentModel::where('id', $sessionData['investmentId'])->first();
            // dd($data['investmentData']);
            $data['planData'] = Plan::where('id', $sessionData['plan_id'])->first();
            $data['userData'] = User::where('id',$sessionData->id)->first();
           // $data['userData'] = $sessionData;
            $data['countryData'] = Country::get();
            $data['stateData'] = State::where('country_id', '231')->get();
            // dd($data);
            
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
        $userData->steps_done = "4";
        $userData->save();
        
        $userData = User::find(Auth::user()->id);
        $userData = $request->session()->get('userData');
        $userData['paypal_transaction_id']=$paymentId;
        $userData['amount']=$amount;
        $userData['investmentId']=$userData['investmentId'];
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        return Redirect::to('/investment/create-step4');
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
        if(isset($userData->plan_id) && isset($userData->investmentId) && isset($userData->id)){
            $investmentData = InvestmentModel::where('id', $userData['investmentId'])->first();
            if(is_null($investmentData['paypal_transaction_id']) 
            || is_null($investmentData['amount'])
            ){
                return Redirect::to('/investment/create-step4');
            }
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::where('plan_id', $userData['plan_id'])->get(); 
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
            $data['investmentData'] = $investmentData;
            // dd($data);
            return view('front.users.create-step5', $data);
        }else{
            return view('pages-404');
        }       
    }

    public function updateSignature(Request $request)
    {
        $rules = [
            'indicateagreement' => 'required',
            'reinvestment' => 'required',
            'signature' => 'required',
        ];
        $messages = [
            'indicateagreement.required' => 'indicateagreement is required.',
            'reinvestment.required' => 'reinvestment is required.',
            'signature.required' => 'signature is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($validator);
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
            //  dd($investmentData);
            $investmentData->indicateagreement = $indicate;
            $investmentData->reinvestment = $request->reinvestment;
            if ($request->signature) {
                $investmentData->signature = $filename .'.png';
            }
            $investmentData->save();
            $userData = User::find(Auth::user()->id);
            $userData->steps_done = "5";
            $userData->save();
            $investmentData = InvestmentModel::find($request->investmentId);
            $userData = User::find($request->user_id);
            $data['investmentData'] = $investmentData;
            $userData['plan_id'] = $request->plan_id;
            $userData['investmentId'] = $request->investmentId;
            $userData['paypal_transaction_id'] = $investmentData['paypal_transaction_id'];
            $userData['amount'] = $investmentData['amount'];
            $userData = $request->session()->put('userData', $userData);
            $userData = $request->session()->get('userData');
            $documentData = DocumentManagemetModel::where('plan_id', $request->plan_id)->get();
            $data['planData'] = Plan::where('id', $userData['plan_id'])->first();
            $data['userData'] = $userData;
            $data['documentData'] = $documentData;
           // dd($data);
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
            $investmentData  = InvestmentModel::where('id',$userData->investmentId)->first();
            // if(is_null($investmentData['paypal_transaction_id']) 
            // || is_null($investmentData['amount'])
            // ){
            //     return Redirect::to('/investment/create-step5');
            // }

            if(is_null($investmentData['indicateagreement']) 
            || is_null($investmentData['reinvestment'])
            ){
                return Redirect::to('/investment/create-step5');
            }
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
            $userData['stateData'] = State::where('country_id', '231')->get();
            // dd($userData['investmentData']);
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
        $userData = User::find(Auth::user()->id);
        $userData->steps_done = "6";
        $userData->save();
        $userData = User::find($request->user_id);
        
        $investData = InvestmentModel::where('id', $request->investmentId)->first();
        
        $userData['investmentId'] = $request->investmentId;
        $userData['plan_id'] = $request->plan_id;
        $userData['amount'] = $investData['amount'];
        $userdata['investData']=$investData;
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        $data['userData'] = $userData;

        $userData = User::find($request->user_id);
        $investData = InvestmentModel::where('id', $request->investmentId)->first();
        // dd(Auth::user());
        $notificationData = [
            "user" => $userData['name'],
            "message" => Auth::user()->first_name." You have invest  $".$investData['amount']." with trancation id ".$investData['paypal_transaction_id']." will complete on ".$investData['plan_end_date'], 
            "investmentId" => $investData['id']
        ];
         //dd($notificationData);

        //$userData->notify(new WithdrawReaction($notificationData));
        $userData->notify(new InvestmentConformationMail($notificationData));

        return redirect('/client');
        // return view('front.users.payment', $data);
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

    public function checkUsersStep(){
        $useData= Auth::user();
        // if($useData['steps_done']==="4"){
        //     return Redirect::to('/investment/create-step5');
        // }
        // dd($useData['steps_done']);
        if($useData['steps_done']==="2"){
            return Redirect::to('/investment/create-step3');
        }elseif($useData['steps_done']==="3"){
            return Redirect::to('/investment/create-step4');
        }elseif($useData['steps_done']==="4"){
            return Redirect::to('/investment/create-step5');
        }
        elseif($useData['steps_done']==="5"){
            return Redirect::to('/investment/create-step6'); 
        }
        elseif($useData['steps_done']==="6"){
            return Redirect::to('/client');
        }
        dd($useData['steps_done']);
    }

    
}
