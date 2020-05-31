<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array('pageName' => 'Contact Us',
            'activeMenu' => 'contact-us-management',
        );
        return view('client.contactUs.contact_us', $result);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'contact_subject' => 'required',
            'contact_option' => 'required',
            'message' => 'required',
        ];
        $messages = [
            'contact_subject.required' => 'Contact Subject is required.',
            'contact_option.required' => 'Contact option is required.',
            'message.required' => 'Please type your message.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $bankData = ContactUsModel::create([
                'name' => $request->name,
                'email'=>Auth::user()->email,
                'phone'=>Auth::user()->phoneNumber,
                'contact_subject' => $request->contact_subject,
                'contact_option' => $request->contact_option,
                'message' => $request->message,
            ]);
            return redirect('/client/contact-us-management')->with(['status' => 'success', 'message' => 'Your query submitted successfully!']);
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
        }
    }

}
