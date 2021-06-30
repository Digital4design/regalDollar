<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersReferral;
use App\User;
use Auth;
use Validator;
use Mail;

class ShareReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array(
            'pageName' => 'Referal Page',
            'activeMenu' => 'share-freind-management',
        );
        return view('client.referral.referral', $result);
    }

    public function referralRequest(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $referralCode = $this->generateReferralCode(Auth::user()->id);
            // dd($referralCode);
            // dd(Auth::user()->id);
            // dd($request->all());
            $referralata = UsersReferral::create([
                'user_id' => Auth::user()->id,
                'referral_code' => $referralCode,
            ]);
            if ($referralata) {
                $mailData = [
                    'ref_by' => Auth::user()->name,
                    'referralcode' => Auth::user()->ref_code,
                    'referralUser' => $toUser[0]
                ];
                $user = User::findOrFail(Auth::user()->id);

                Mail::send('mailTemplete.referral', ['mailData' => $mailData], function ($m) use ($user) {
                    $m->from(Auth::user()->email, env('APP_NAME'));

                    $m->to($user->email, $user->name)->subject('Referral Mail');
                });
                // $notificationData = [
                //     "adminName" => Auth::user()->name,
                //     "useremail" => $request->email,
                //     'userPhone' => "kjsdlfjsldkjf",
                //     "message" => "kjsdfhsjkdfhkjsdhfjk",
                // ];
                // $this->admin->notify(new Referral($notificationData));
            }
            return redirect('/referral')->with(['status' => 'success', 'message' => 'Refer Successfully!']);
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }
    }

    public function generateReferralCode($user_id)
    {
        $acceptablePasswordChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$generateCode = "";
		for ($i = 0; $i < 5; $i++)
			{

			// for generate password

			$generateCode.= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1) , 1);
            }
        // dd($generateCode);
        //$generateCode = rand(1000, 9999);
        $referralCode = UsersReferral::where('referral_code', $generateCode)->get()->toArray();
        if (count($referralCode) > 0) {
            return $this->generateReferralCode($user_id);
        } else {
            return $generateCode;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
