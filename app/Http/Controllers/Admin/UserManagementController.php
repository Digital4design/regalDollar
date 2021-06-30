<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRoleRelation;
use App\Models\InvestmentModel;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Carbon\Carbon;
use DataTables;
use Validator;
use App\Role;
use App\User;
use Redirect;
use Crypt;
use Mail;
use Hash;
Use Auth;
use DB;

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
    public function createUser()
    {
        $result = array(
            'pageName' => 'Create User',
            'activeMenu' => 'user-management',
            'roles' => Role::get(),
            'countryData' => Country::get()
        );

        return view('admin.users.create_user', $result);
    }
    public function saveUser(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required|min:2',
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'address' => 'required',
            'zipcode' => 'required|numeric|min:6',
            'country_citizenship' => 'required',
            'country_residence' => 'required',
        ];
        $messages = [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'address.required' => 'Password is required.',
            'country_citizenship.required' => 'Password is required.',
            'country_residence.required' => 'Password is required.',
            'last_name.min' => 'First name should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $referralCode = $this->generateReferralCode();
        //dd($referralCode);
        try {
            
            $userData = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->name,
                'email' => $request->email,
                'country_citizenship' => $request->country_citizenship,
                'country_residence' => $request->country_residence,
                'password' => Hash::make($request->password),
                'ref_code' => $referralCode,
                'is_verify' => "pending",
            ]);
            $roleArray = array(
                'user_id' => $userData->id,
                'role_id' => 2, // customer role Id
            );
           // dd($userData);
            UserRoleRelation::insert($roleArray);
            $toemail =$userData->email;

            $mailData = [
                'user_name' => $userData->name,
                'user_email' => $userData->email,
                'user_password' => $request->password
            ];
            $user = User::findOrFail(Auth::user()->id);

            Mail::send('mailTemplete.welcome_user', ['mailData' => $mailData], function ($m) use ($user,$toemail) {
                $m->from(Auth::user()->email, env('APP_NAME'));

                $m->to( $toemail , Auth::user()->name)->subject('Welcome Mail');
            });


            return redirect('/admin/users-management/')->with(['status' => 'success', 'message' => 'User created successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            //    return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }
    }
    public function UserData()
    {
        $userList = User::whereHas('getRolesUser', function ($q) {
            $q->where(['role_id' => 2]);
        })
        ->orderBy('id', 'desc')
        ->get();
        // dd($userList);
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
            $investmentData = DB::table('investment')
                ->join('plans', 'plans.id', '=', 'investment.plan_id')
                ->select('investment.*', 'plans.plan_name')
                ->where('investment.user_id', Crypt::decrypt($id))
                ->get();
            // $investmentData = InvestmentModel::where('user_id', Crypt::decrypt($id))->first();
            // dd($investmentData);

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
                $data['investmentData'] = $investmentData;
                $data['roles'] = Role::get();
                // dd($data);
                return view('admin.users.user_view', $data);
            } else {
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
            } else {
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
            'address' => 'required',
            'address2' => 'required',
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
            if($request->is_block=='true'){
                $blocked_at= Carbon::now();
            }else{
                $blocked_at=null;
            }
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
            $user->is_block= $request->is_block;
            $user->blocked_at= $blocked_at;
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
    public function generateReferralCode()
    {
        $acceptablePasswordChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $generateCode = "";
        for ($i = 0; $i < 6; $i++) {
            // for generate password
            $generateCode .= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1), 1);
        }
        // dd($generateCode);
        //$generateCode = rand(1000, 9999);
        $referralCode = User::where('ref_code', $generateCode)->get()->toArray();
        if (count($referralCode) > 0) {
            return $this->generateReferralCode();
        } else {
            return $generateCode;
        }
    }
	
		
		
	public function getClientUserInvestmentPlanListHTML(Request $request){
		$clientId = $request->client_id;
		
		$investmentData = DB::table('investment')
                ->join('plans', 'plans.id', '=', 'investment.plan_id')
                ->select('investment.*', 'plans.plan_name')
                ->where('investment.user_id', $clientId)
                ->get();
		//dd( $investmentData);
		
		
		 return response()->json(['status'=> 'success' ,'list' => $investmentData]);  
	}

	
}
