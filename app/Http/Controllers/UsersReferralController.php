<?php

namespace App\Http\Controllers;

use App\Models\UsersReferral;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Mail;
use App\Models\FooterModel;
use App\Models\FooterContent;

class UsersReferralController extends Controller
{
    public function index()
    {
        $footerdata = FooterModel::get();
        $sectiondata =  FooterModel::select('section')->distinct()->get();
        $footerContent = FooterContent::get()->toArray();
        //dd($sectiondata);

        return view('referral')->with([
            'footerdata' => $footerdata,
            'sectiondata' => $sectiondata,
            'footerContent' => $footerContent
        ]);
    }

    public function referralRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $referralData = UsersReferral::where('email', $request->email)->get();

            if (count($referralData) < 1) {
                $referralData = UsersReferral::create([
                    'user_id' => Auth::user()->id,
                    'referral_code' => Auth::user()->ref_code,
                    'email' => $request->email
                ]);
            }
            // dd($referralData);

            if ($referralData) {
                $toUser = explode('@', $request->email);

                $mailData = [
                    'ref_by' => Auth::user()->name,
                    'referralcode' => Auth::user()->ref_code,
                    'referralUser' => $toUser[0]
                ];
                $user = User::findOrFail(Auth::user()->id);

                $toemail = $referralData[0]['email'];
                // dd($toemail);
                Mail::send('mailTemplete.referral', ['mailData' => $mailData], function ($m) use ($user, $toemail) {
                    $m->from(Auth::user()->email, env('APP_NAME'));
                    $m->to($toemail, Auth::user()->name)->subject('Referral Mail');
                });
            }
            return redirect('/referral')->with(['status' => 'success', 'message' => 'Refer Successfully!']);
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            //return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }
    }

    public function generateReferralCode($user_id)
    {
        $acceptablePasswordChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $generateCode = "";
        for ($i = 0; $i < 6; $i++) {

            // for generate password

            $generateCode .= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1), 1);
        }
        
        $referralCode = User::where('referral_code', $generateCode)->get()->toArray();
        if (count($referralCode) > 0) {
            return $this->generateReferralCode($user_id);
        } else {
            return $generateCode;
        }
    }
}
