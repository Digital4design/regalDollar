<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Role;
use App\User;
use Crypt;
use DataTables;
use Illuminate\Http\Request;
use Mail;
use Redirect;
use Validator;

class UserManagementController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * getAllVendors Listing landing function
     * @return void
     */
    public function index()
    {
        $result = array(
            'pageName' => 'User Listing',
            'activeMenu' => 'user-management',
        );
        $data['roles'] = Role::get();
        return view('admin.users.user-listing', $result);
    }
    public function UserData()
    {
        $userList = User::whereHas('getRolesUser', function ($q) {
            $q->where(['role_id' => 2]);
        })
            ->orderBy('id', 'desc')
            ->get();
        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/admin/users-management/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                <a href ="' . url('/admin/users-management/view') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View</a>
                <a data-id =' . Crypt::encrypt($userList->id) . ' class="btn btn-xs btn-danger delete" style="color:#fff"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';
            })->make(true);
    }
    /*
     *  @editViewCustomer edit Customer View
     */
    public function singleuser($id)
    {
        try {
            $user = User::find(Crypt::decrypt($id));
            
            $data = array(
                'pageName' => 'View User',
                'activeMenu' => 'user-management',
            );
            if ($user) {
                if (!empty($user->country_id)) {
                    $data['country'] = Country::find($user->country_id);
                } else {
                    $data['country'] = '';
                }
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
                //$data['country'] = Country::select('id', 'name')->get();
                $data['user'] = $user;
                $data['roles'] = Role::get();
                // dd($data);
                return view('admin.users.user_view', $data);
            }else{
                return Redirect::to('/admin/users-management'); 
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    /*
     *  @editViewCustomer edit Customer View
     */

    public function editViewUser($id)
    {
        try {
            $user = User::find(Crypt::decrypt($id));
            $data = array(
                'pageName' => 'Edit User',
                'activeMenu' => 'user-management',
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
                //$data['country'] = Country::select('id', 'name')->get();
                $data['country'] = Country::get();
                $data['stateData'] = State::where('country_id', '231')->get();
                $data['user'] = $user;
                $data['roles'] = Role::get();
               // dd($data);
                return view('admin.users.user_edit', $data);
            }else{
                return Redirect::to('/admin/users-management');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createViewUser()
    {
        $result = array(
            'pageName' => 'New User',
            'activeMenu' => 'user-management',
        );
        return view('admin.users.user_create', $result);
    }
    /*
     * update Customer Data
     */
    public function updateUsers(Request $request, $id)
    {

        //dd($request->all());
        $rules = [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'address'=>'required',
            'address2'=>'required',
            'country_residence' => 'required',
            'state' => 'required',
            'city' => 'required',
            'info_zip' => 'required|numeric',
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
            $user = User::find(\Crypt::decrypt($id));
            $user->first_name = trim($request->first_name);
            $user->last_name = trim($request->last_name);
            $user->address = trim($request->address);
            $user->address2 = trim($request->address2);
            $user->country_residence = trim($request->country_residence);
            $user->country_residence = trim($request->country_residence);
            $user->state = trim($request->state);
            $user->city = trim($request->city);
            $user->zipcode = trim($request->info_zip);
            $user->save();
            return redirect('/admin/users-management/')->with(['status' => 'success', 'message' => 'Update record successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            //    return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }
    }
    /**
     * Delete User
     *
     * @return void
     */
    public function deleteUser($id)
    {
        User::find(Crypt::decrypt($id))->delete();
    }

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
            $result = Mail::send('mail.verify', array('content' => $message), function ($title) use ($EmailAddress) {
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
}
