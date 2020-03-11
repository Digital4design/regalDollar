<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Auth;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
            dd($request->all());
            return redirect('/user/user-management')->with(['status' => 'success', 'message' => 'New user Successfully created!']);
        } catch (\Exception $e) {
            //return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }

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
        // dd($coreData);
        return view('public.home')->with(['investmentData' => $investmentData, 'coreData' => $coreData]);
    }

}
