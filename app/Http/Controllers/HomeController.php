<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
    public function getData()
    {
        $planData = Plan::get();
        return view('public.home')->with(['planData' => $planData]);
    }

}
