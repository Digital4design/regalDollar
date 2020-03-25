<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use App\Models\InvestmentModel;
use App\User;
use Auth;
use DB;

class PaymentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function paymentProcess($id ,Request $request)
    {
        $userData = User::find(Auth::user()->id);
        $userData = $request->session()->get('userData');
        // dd($userData); // working here

        // DB::table('investment')
        // ->where('user_id',$userData['id'])
        // ->where('plan_id',$userData['plan_id'])
        // ->update([
        //     'paypal_transaction_id' => $id,
        // ]);
        InvestmentModel::where('user_id',$userData['id'])
            ->where('plan_id',$userData['plan_id'])
            ->update(
                [
                    'paypal_transaction_id' => $id,
                ]);
        
        $userData = User::find(Auth::user()->id);
        $userData = $request->session()->put('userData', $userData);
        $userData = $request->session()->get('userData');
        return redirect('/client');
    }
    public function getTransactionDetails($transaction_id){
        $curl = curl_init("https://api.sandbox.paypal.com/v1/checkout/orders/$transaction_id");
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . '<access_token>',
            'Accept: application/json',
            'Content-Type: application/json'
        ));
        $response = curl_exec($curl);
        $result = json_decode($response);
       // dd($result);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
