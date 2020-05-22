<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvestmentModel;
use App\Models\BankAccountModel;
use App\Notifications\Admin\WithdrawReaction;
use App\Role;
use DB;
use DataTables;
use App\User;
use Crypt;
use Auth;

class WithdrowManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $result = array(
            'pageName' => 'Request Listing',
            'activeMenu' => 'withdraw-request-managment',
        );
        $data['roles'] = Role::get();
        return view('admin.withdrawRequest.index', $result);
    }

    public function withdrawData()
    {
        $userList = DB::table('investment')
            ->select('investment.*', 'users.first_name','plans.plan_name')
            ->join('users', 'investment.user_id', '=', 'users.id')
            ->join('plans', 'investment.plan_id', '=', 'plans.id')
            ->where('investment.is_request','1')
            ->where('investment.paypal_transaction_id','!=','')
            ->get();
       // dd($userList);
        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/admin/withdraw-request-managment/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
            })->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investmentData = DB::table('investment')
            ->join('users', 'investment.user_id', '=', 'users.id')
            ->join('plans', 'investment.plan_id', '=', 'plans.id')
            ->where('investment.id',\Crypt::decrypt($id))
            ->select('investment.*', 'users.first_name','plans.plan_name')
            ->first();
        // dd($investmentData);
        $result = array(
            'pageName' => 'User Listing',
            'activeMenu' => 'user-management',
            'investmentData'=> $investmentData 
        );
        return view('admin.withdrawRequest.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if($request->is_request=='2'){
                $statusChange= 'Approve';
            }else{
                $statusChange= 'Unapprove';
            }
            $investmentData = InvestmentModel::find(\Crypt::decrypt($id));
            $investmentData->is_request = $request->is_request;
            $investmentData->save();
            $investmentData = InvestmentModel::find(\Crypt::decrypt($id));
            $userData = User::find($investmentData['user_id']);
            $notificationData = [
                "user" => $userData['name'],
                "message" => Auth::user()->first_name." ".$statusChange." your request for withdraw", 
                "investmentId" => "\Crypt::decrypt($id)"
            ];
            // dd($notificationData);
            $userData->notify(new WithdrawReaction($notificationData));
            return redirect('/admin/withdraw-request-managment/')->with(['status' => 'success', 'message' => $statusChange.' successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            //  return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }
    }
}
