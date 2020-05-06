<?php

namespace App\Http\Controllers;

use App\Models\ContactUsModel;
use App\Models\Plan;
use App\Models\InvestmentModel;
use App\Notifications\ContactUs;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $date = date("Y-m-d H:i:s");
        $day_before = date( 'Y-m-d H:i:s ', strtotime( $date . ' -1 day' ) );
        InvestmentModel::whereNull('paypal_transaction_id')->where('created_at',$day_before)->delete();
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $Role = Auth::user()->roles->first();
            // dd($Role);
            if (!empty($Role)) {
                return redirect('/' . $Role->name);
            } else {
                Auth::logout();
                return redirect('/');
            }
        }
        Auth::logout();
        return redirect('/');
    }
    public function getPlanData()
    {
        $investmentData = Plan::where('plan_type', '1')->get();
        $coreData = Plan::where('plan_type', '2')->get();
        return view('public.home')->with([
                'investmentData' => $investmentData,
                'coreData' => $coreData,
            ]);
               
    }

    public function getPlanDetails(Request $request,$id){
        $planData = Plan::where('id', $id)->first();
        return view('public.plandetailPage')->with([
            'planData' => $planData,
        ]);
    }
    public function contactUs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|min:2',
            'message' => 'required|min:2',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $planData = ContactUsModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);
            $user = User::where('id', 1)->first();
            if ($planData) {
                $notificationData = [
                    "adminName" => $user->name,
                    "username" => $request->name,
                    "useremail" => $request->email,
                    'userPhone' => $request->phone,
                    "message" => $request->message,
                ];
                //dd($notificationData);
                $user->notify(new ContactUs($notificationData));
            }
            return redirect('/contact_us')->with(['status' => 'success', 'message' => 'Form submitted Successfully!']);
        } catch (\Exception $e) {
            //return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }

    }

}
