<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use App\User;
use Auth;

class PaymentController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext();
    }
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
        // dd($userData);
        $userData->paypal_transaction_id = trim($id);
        $userData->save();
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
        dd($result);
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
