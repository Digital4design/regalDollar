<?php

namespace App\Http\Controllers;

use DateTime;
use App\Notifications\ContactUs;
use App\Models\ContactUsDetail;
use App\Models\InvestmentModel;
use App\Models\ContactUsModel;
use App\Models\FooterContent;
use Illuminate\Http\Request;
use App\Models\FooterModel;
use App\Models\FQAModel;
use App\Models\Plan;
use Validator;
use App\User;
use Auth;
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
        $day_before = date('Y-m-d H:i:s ', strtotime($date . ' -1 day'));
        InvestmentModel::whereNull('paypal_transaction_id')->where('created_at', $day_before)->delete();
        // $this->middleware('auth');

        $this->admin = User::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->first();
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $Role = Auth::user()->roles->first();
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
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        //dd($sectiondata);

        return view('public.home')->with([
            'investmentData' => $investmentData,
            'coreData' => $coreData,
            'footerdata' => $footerdata,
            'sectiondata' => $sectiondata,
            'footerContent' => $footerContent
        ]);
    }
    public function getCorePlans()
    {
        $investmentData = Plan::where('plan_type', '1')->get();
        $coreData = Plan::where('plan_type', '2')->get();
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        return view('investment')->with([
            'investmentData' => $investmentData,
            'coreData' => $coreData,
            'footerdata' => $footerdata,
            'sectiondata' => $sectiondata,
            'footerContent' => $footerContent,
        ]);
    }

    public function getContactDetails()
    {
        $contactUsDetail = ContactUsDetail::get()->toArray();
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        return view('contact_us')->with([
            'contactUsDetail' => $contactUsDetail,
            'footerdata' => $footerdata,
            'sectiondata' => $sectiondata,
            'footerContent' => $footerContent,
        ]);
    }


    public function getFQA()
    {
        $fqaDetail = FQAModel::get()->toArray();
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        return view('faq')->with([
            'fqaDetail' => $fqaDetail,
            'footerdata' => $footerdata,
            'sectiondata' => $sectiondata,
            'footerContent' => $footerContent,
        ]);
    }
    public function getAboutUs()
    {
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        return view('about_us')->with([
            'footerdata' => $footerdata,
            'sectiondata' => $sectiondata,
            'footerContent' => $footerContent,
        ]);
    }

    public function getPlanDetails(Request $request, $id)
    {
        $planData = Plan::where('id', $id)->first();
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        return view('public.plandetailPage')->with([
            'planData' => $planData,
            'footerdata' => $footerdata,
            'sectiondata' => $sectiondata,
            'footerContent' => $footerContent,
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
            if (Auth::user()) {
                // Check is user logged in
                $contact_from = "registered";
            } else {
                $contact_from = "visitor";
            }
            $planData = ContactUsModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'contact_from' => $contact_from,
                'message' => $request->message,
            ]);

            if ($planData) {
                $notificationData = [
                    "adminName" => $request->name,
                    "username" => $request->name,
                    "useremail" => $request->email,
                    'userPhone' => $request->phone,
                    "message" => $request->message,
                ];
                //dd($notificationData);
                $this->admin->notify(new ContactUs($notificationData));
            }
            return redirect('/contact_us')->with(['status' => 'success', 'message' => 'Form submitted Successfully!']);
        } catch (\Exception $e) {
            //return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }
    }
    public function getAllInvestmentWithDays()
    {
        $investData = DB::table('investment')
            ->select('investment.*', 'plans.interest_rate', 'plans.plan_name', 'plans.time_investment', 'plans.plan_fee', 'users.name')
            //->select('investment.*','plans.plan_name','users.name')
            ->join('plans', 'plans.id', '=', 'investment.plan_id')
            ->join('users', 'users.id', '=', 'investment.user_id')
            ->where('investment.amount', '!=', '')
            ->where('investment.paypal_transaction_id', '!=', '')
            ->get();
        foreach ($investData as $invest) {
            // dd($invest);
            $date1 = new DateTime($invest->plan_start_date);
            $date2 = new DateTime(date("Y-m-d"));
            $days  = $date2->diff($date1)->format('%a');
            $user = User::find($invest->user_id);

            if ($days == 4 && $days == 7) {
                // dd($user->name);
                // echo $days;
                $notificationData = [
                    "adminName" => $this->admin->name,
                    "username" => $user->name,
                    "useremail" => $this->admin->email,
                    'userPhone' => '',
                    "message" => $user->name . ' completed ' . $days . ' days his/her investment day with plan ' . $invest->plan_name . ' amount ' . $invest->amount,
                ];
                $this->admin->notify(new ContactUs($notificationData));

                $notificationData = [
                    "adminName" => $user->name,
                    "username" => 'kdjflkdsjflkd',
                    "useremail" => 'sjdkflsdjlkfkjld',
                    'userPhone' => '',
                    "message" => 'You have completed ' . $days . ' days with investment plan ' . $invest->plan_name . ' amount ' . $invest->amount,
                ];
                $user->notify(new ContactUs($notificationData));
            }
        }

       // dd($investData);
    }
}
