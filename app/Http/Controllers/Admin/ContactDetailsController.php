<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Models\ContactUsDetail;
use Crypt;
use DataTables;
use Mail;
use Redirect;
use Validator;
use App\Models\InvestmentModel;

class ContactDetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array(
            'pageName' => 'Contact Details Listing',
            'activeMenu' => 'contact-details',
        );
        $data['roles'] = Role::get();
        return view('admin.contactDetals.contactDetails-listing', $result);
    }

    public function PlanData()
    {
        $userList = ContactUsDetail::orderBy('id', 'desc')->get();
        //dd($userList);

        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/admin/contact-details/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                ';
            })->make(true);
    }


    public function editViewPlan($id)
    {
        try {
            $plan = ContactUsDetail::find(Crypt::decrypt($id));
            $data = array(
                'pageName' => 'Edit Contact Details',
                'activeMenu' => 'contact-details',
                'planData' => $plan,
            );

            $data['roles'] = Role::get();
            return view('admin.contactDetals.contactDetails_edit', $data);
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    public function updatePlans(Request $request, $id)
    {
        $planData = ContactUsDetail::find(\Crypt::decrypt($id));
        $rules = [
            'contact_number' => 'required',
            'contact_email' => 'required',
            'contact_address' => 'required',
        ];
        $messages = [
            'contact_number.required' => 'contact number is required.',
            'contact_email.required' => 'contact email is required.',
            'contact_address.required' => 'contact address is required.',
            'firstName.min' => 'First name should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {

            $planData = ContactUsDetail::find(\Crypt::decrypt($id));
            $planData->contact_number = $request->has('contact_number') ? $request->contact_number : $planData->contact_number;
            $planData->contact_email= $request->has('contact_email') ? $request->contact_email : $planData->contact_email;
            $planData->contact_address = $request->has('contact_address') ? $request->contact_address : $planData->contact_address;
            $planData->save();
            return redirect('/admin/contact-details/')->with(['status' => 'success', 'message' => 'Update record successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
