<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Plan;
use App\Models\DocumentManagemetModel;
use App\Models\State;
use App\Role;
use App\User;
use Crypt;
use DataTables; 
use Illuminate\Http\Request;
use Mail;
use Redirect;
use Validator;

class PlanManagementController extends Controller
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
     * getAllVendors Listing landing function
     *
     * @return void
     */
    public function index()
    {
        $result = array(
            'pageName' => 'Plan Listing',
            'activeMenu' => 'plan-management',
        );
        $data['roles'] = Role::get();
        return view('admin.plans.plan-listing', $result);
    }
    public function PlanData()
    {
        $userList = Plan::orderBy('id', 'desc')->get();
        // dd($userList);
        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/admin/plan-management/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
				<a data-id =' . Crypt::encrypt($userList->id) . ' class="btn btn-xs btn-danger delete" style="color:#fff"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';
            })->make(true);
    }
    
   
    /***
     * Crate New Plan
     **/

    public function createViewPlan()
    {
        $result = array(
            'pageName' => 'New Plan',
            'activeMenu' => 'plan-management',
        );
        return view('admin.plans.plan_create', $result);
    }
    /*
     * Crate New Plan
     */
    public function storePlan(Request $request)  
    {
        
        $rules = [
            'plan_name' => 'required|min:4',
            'slogan' => 'required|min:2',
            'plan_fee' => 'required|numeric',
            // 'price' => 'required|numeric',
            'duration' => 'required|numeric',
            'time_investment' => 'required|numeric',
            'icon' => 'required',
            'descritpion' => 'required',
        ];
        if (empty($_POST['descritpion'][0])) {
            $rules['descritpion'] = 'required|min:4'; 
        }
        $messages = [
            'plan_name.required' => 'Plan name is required.',
            'plan_name.min' => 'First name should contain at least 4 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $descritpion = json_encode($request->descritpion);
            $planData = Plan::create([
                'plan_name' => $request->plan_name,
                'slogan' => $request->slogan,
                'interest_rate' => $request->interest_rate,
                'view_details_url' => $request->view_details_url,
                'duration' => $request->duration,
                'plan_fee'=>$request->plan_fee,
                'plan_type' => $request->plan_type,
                'time_investment' => $request->time_investment,
                'plan_valid_from' => $request->plan_valid_from,
                'descritpion' => $descritpion,
            ]);
            if ($request->icon != "") {
                $plan_save = Plan::where('id', $planData->id)->first();
                if ($plan_save->icon != "") {
                    if (file_exists(public_path('/uploads/plan_icon/' . $plan_save->icon))) {
                        $del_previous_pic = unlink(public_path('/uploads/plan_icon/' . $plan_save->icon));
                    }
                }
                $file = $request->file('icon');
                $filename = 'plan-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/uploads/plan_icon', $filename);
                $plan_save->icon = $filename;
                $plan_save->save();
            }
            if ($request->plan_doc != "") {
                foreach ($request->plan_doc as $photo) {
                    $filename = $photo->getClientOriginalName() . $photo->getClientOriginalExtension();
                    // $filename = 'docs-' . time() .'-'. rand(15,35) .'.' . $photo->getClientOriginalExtension();
                    $updaloadFile = $photo->move('public/uploads/documents_management',$filename);
                    DocumentManagemetModel::create([
                        'plan_id' => $planData->id,
                        'documents_path' => $filename
                    ]);
                }
            }
            return redirect('/admin/plan-management/')->with(['status' => 'success', 'message' => 'Create New Plan Created successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*
     *  @editViewCustomer edit Customer View
     */
    public function singleplan($id)
    {
        try {
            $user = Plan::find(Crypt::decrypt($id));
            $data = array(
                'pageName' => 'Single Plan',
                'activeMenu' => 'plan-management',
            );
            if ($user) {
                if (!empty($user->state_id)) {
                    $data['states'] = State::find($user->state_id);
                } else {
                    $data['states'] = '';
                }
                if (!empty($user->city_id)) {
                    $data['city'] = City::find($user->city_id);
                } else {
                    $data['city'] = '';
                }
                $data['country'] = Country::select('id', 'name')->get();
                $data['user'] = $user;
                $data['roles'] = Role::get();

                return view('admin.plans.plan_view', $data);
            }
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

     /*
     *  @edit Plan View
     */
    public function editViewPlan($id)
    {
        try {
            $plan = Plan::find(Crypt::decrypt($id));
            $planDocs = DocumentManagemetModel::where('plan_id',Crypt::decrypt($id))->get();
            $data = array(
                'pageName' => 'Edit Plan',
                'activeMenu' => 'plan-management',
                'planData' => $plan,
                'planDocs' => $planDocs,
            );
            
            $data['roles'] = Role::get();
            return view('admin.plans.plan_edit', $data);
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }
    /*
     * update Plan Data
     */
    public function updatePlans(Request $request, $id)
    {
        $rules = [
            'plan_name' => 'required|min:4',
            'slogan' => 'required|min:2',
            'plan_fee' => 'required|numeric',
            'duration' => 'required|numeric',
            'time_investment' => 'required|numeric',
            'descritpion' => 'required',
        ];
        $messages = [
            'firstName.required' => 'Your first name is required.',
            'firstName.min' => 'First name should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $descritpion = json_encode($request->descritpion);
            $planData = Plan::find(\Crypt::decrypt($id));
            $planData->plan_name = trim($request->plan_name);
            $planData->slogan = trim($request->slogan);
            $planData->plan_fee = $request->plan_fee;
           
            $planData->interest_rate = trim($request->interest_rate);
            $planData->view_details_url = trim($request->view_details_url);
            $planData->duration = trim($request->duration);
            $planData->time_investment = trim($request->time_investment);
            $planData->plan_valid_from = trim($request->plan_valid_from);
            $planData->plan_type = $request->plan_type;
            $planData->descritpion = $descritpion;
            $planData->save();

            if ($request->icon != "") {
                $plan_save = Plan::where('id', $planData->id)->first();
                if ($plan_save->icon != "") {
                    if (file_exists(public_path('/uploads/plan_icon/' . $plan_save->icon))) {
                        $del_previous_pic = unlink(public_path('/uploads/plan_icon/' . $plan_save->icon));
                    }
                }
                $file = $request->file('icon');
                $filename = 'plan-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/uploads/plan_icon', $filename);
                $plan_save->icon = $filename;
                $plan_save->save();
            }

            if ($request->plan_doc != "") {
                $docData = DocumentManagemetModel::where('plan_id', $planData->id)->count();
               // dd($docData);
                if($docData > 0) {
                    // DocumentManagemetModel::where('plan_id', $planData->id)->delete();
                    foreach ($request->plan_doc as $photo) {
                        
                        // $filename = 'docs-' . time() .'-'. rand(15,35) .'.' . $photo->getClientOriginalExtension();
                        $filename = $photo->getClientOriginalName() . $photo->getClientOriginalExtension();
                        $updaloadFile = $photo->move('public/uploads/documents_management',$filename);
                        DocumentManagemetModel::create([
                            'plan_id' => $planData->id,
                            'documents_path' => $filename
                            ]);
                        }
                    }else{

                       // DocumentManagemetModel::where('plan_id', $planData->id)->delete();
                        foreach ($request->plan_doc as $photo) {
                            $filename = $photo->getClientOriginalName() . $photo->getClientOriginalExtension();
                            // $filename = 'docs-' . time() .'-'. rand(15,35) .'.' . $photo->getClientOriginalExtension();
                            $updaloadFile = $photo->move('public/uploads/documents_management',$filename);
                            DocumentManagemetModel::create([
                                'plan_id' => $planData->id,
                                'documents_path' => $filename
                                ]);
                            }
                        }
                    }
                    return redirect('/admin/plan-management/')->with(['status' => 'success', 'message' => 'Update record successfully.']);
                } catch (\exception $e) {
                    return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
                }
            }
    
    /**
     * Genearate Randam Code
     */
    public function genrateRandCode($length, $smallabc = false)
    {
        if ($smallabc == false) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        } else {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        }
        $size = strlen($chars);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        $check_code = User::where('sid_code', $str)->first();
        if (!empty($check_code)) {
            $this->genrateRandCode(6, $smallabc = false);
        } else {
            return $str;
        }
    }
    public function userReportMail($message, $EmailAddress)
    {
        try {
            $result = Mail::send('mail.verify', array('content' => $message),
                function ($title) use ($EmailAddress) {
                    $title->to($EmailAddress)
                        ->subject('hai this is testing');
                });
            if (count(Mail::failures()) > 0) {
                return $errors = 'Failed to send email, please try again.';
            }
            //return  $errors='mail sent';
            return response()->json(['status' => 201, 'message' => 'mail sent']);
        } catch (\Exception $e) {
            return response()->json(['status' => 200, 'message' => $e->getMessage()]);
        }
    }
    /**
     * Delete Plan
     *
     * @return void
     */
    public function deletePlan($id)
    {
        Plan::find(Crypt::decrypt($id))->delete();
    }

}
