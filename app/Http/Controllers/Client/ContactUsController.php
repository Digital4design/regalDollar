<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use Crypt;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ContactUs;
use Validator;
use App\User;

class ContactUsController extends Controller
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
		// dd(Auth::user());
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
            'message.required'=> 'Please type your message.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $contactData = ContactUsModel::create([
                'name' => $request->name,
				'email'=>Auth::user()->email,
                'phone'=>Auth::user()->phoneNumber,
                'contact_from'=>"registered",
                'contact_subject' => $request->contact_subject,
                'contact_option' => $request->contact_option,
                'message' => $request->message,
            ]);
            $user = User::whereHas('roles', function ($q) {
                $q->where('name', 'admin');
            })->get()->toArray();
            if ($contactData) {
            $notificationData = [
                "adminName" => $user[0]['name'],
                "username" => $request->name,
                "useremail" => Auth::user()->email,
                'userPhone' => Auth::user()->phoneNumber,
                "message" => $request->message,
            ];
            //dd($notificationData);
            $this->admin->notify(new ContactUs($notificationData));
         }

            return redirect('/client/contact-us-management')->with(['status' => 'success', 'message' => 'Your query submitted successfully!']);
        } catch (\Exception $e) {
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
        }
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
