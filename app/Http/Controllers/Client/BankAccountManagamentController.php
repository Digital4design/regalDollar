<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccountModel;
use Validator;
use App\User;
use Auth;
use Crypt;
use Hash;

class BankAccountManagamentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array('pageName' => 'Bank Accounts',
            'activeMenu' => 'bank-account-management',
        );
        return view('client.bankAccountManagement.createBankAccount', $result);
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
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'bank_name' => 'required',
            'account_number' => 'required|numeric',
            'swift_code' => 'required',
        ];
        $messages = [
            'first_name.required' => 'Your first name is required.',
            'last_name.min' => 'First name should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $bankData = BankAccountModel::create([
                'user_id' => Auth::user()->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'swift_code' => $request->swift_code,
            ]);
            return redirect('/client/withdraw-management')->with(['pstatus' => 'success', 'pmessage' => 'Your account added successfully!']);
        } catch (\Exception $e) {
            return back()->with(['pstatus' => 'danger', 'pmessage' => $e->getMessage()]);
        }
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

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
