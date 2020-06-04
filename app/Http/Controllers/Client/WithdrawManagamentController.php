<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvestmentModel;
use App\Models\BankAccountModel;
use App\Notifications\Client\UsersReaction;
use App\User;
use Auth;
use Crypt;
use Hash;

class WithdrawManagamentController extends Controller
{
    public function __construct()
    {
        $this->admin = User::whereHas('roles', function($q){
            $q->where('name', 'admin');
        })->first();
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$currentdate = date('Y-m-d');
        $bankData = BankAccountModel::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        // $InvestmentData = InvestmentModel::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
       $InvestmentData = InvestmentModel::where('user_id', Auth::user()->id)
                                        ->where('plan_end_date','<' ,$currentdate )
                                        ->where('is_request','0')
										->orderBy('id', 'desc')
										->first();
		$upcumingInvestData = InvestmentModel::where('user_id', Auth::user()->id)
                                              ->where('plan_end_date','>' ,$currentdate )
                                              ->where('is_request','0')
                                              ->orderBy('id', 'desc')
                                              ->first();
       // dd($InvestmentData);
		$result = array('pageName' => 'Withdraw',
            'activeMenu' => 'withdraw-management',
            'bankData'=>$bankData,
            'investmentData'=>$InvestmentData,
			'upcumingInvestData'=>$upcumingInvestData,
        );
        return view('client.withdrawSection.withdraw_view', $result);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function withdrowRequest(Request $request)
    {
        $investmentData = InvestmentModel::find($request->investId);
        $investmentData->linked_account = $request->linkAccount; 
        $investmentData->is_request = '1';
        $investmentData->save();
        $users = User::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->first();
        $notificationData = [
            "user" => Auth::user()->first_name,
            "message" => Auth::user()->first_name." request for withdraw", 
            "action" => ""
        ];
        $this->admin->notify(new UsersReaction($notificationData));
        // dd($users);
        return redirect('/client');
        
    }  
}
