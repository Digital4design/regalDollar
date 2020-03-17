<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class DashboardController extends Controller
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
     * Dashboard landing function
     *
     * @return void
     */
    public function index()
    {
        $result = array('pageName' => 'Dashboard',
            'activeMenu' => 'dashboard',
        );
        return view('admin.dashboard.dashboard', $result);
    }
    /**
     * myAccount function
     *
     * @return void
     */
    public function myAccount()
    {
        if (!empty(Auth::user()->state_id)) {
            $states = State::find(Auth::user()->state_id);
        } else {
            $states = '';
        }
        if (!empty(Auth::user()->city_id)) {
            $city = City::find(Auth::user()->city_id);
        } else {
            $city = '';
        }
        $vars['country'] = Country::select('id', 'name')->get();
        $vars['activeMenu'] = 'account';
        $vars['states'] = $this->gen_states();
        return view('admin.dashboard.profile', compact('vars', 'states', 'city'));
    }
    /**
     * State acc to countryid function
     *
     * @return void
     */
    public function states(Request $request)
    {
        $vars = State::where(['country_id' => $request->country_id])->select('id', 'name')->get();
        echo json_encode(array('status' => 1, 'data' => $vars));
        die;
    }
    /**
     * City acc to State function
     *
     * @return void
     */
    public function cities(Request $request)
    {
        $vars = City::where(['state_id' => $request->id])->select('id', 'name')->get();
        echo json_encode(array('status' => 1, 'data' => $vars));
        die;
    }
    /**
     * myAccount function
     *
     * @return void
     */
    public function editAccount(Request $request)
    {
        $rules = [
            'first_name' => 'required|min:2|regex:/^[A-Za-z. -]+$/',
            'last_name' => 'required|min:2|regex:/^[A-Za-z. -]+$/',
            'info_country' => 'required|numeric',
            'info_state' => 'required|numeric',
            'info_city' => 'required|numeric',
            'zipcode' => 'required|numeric',
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
            $user = User::find(Auth::user()->id);
            $user->first_name = trim($request->first_name);
            $user->last_name = trim($request->last_name);
            $user->address = trim($request->address);
            $user->address2 = trim($request->address2);
            $user->country_id = trim($request->info_country);
            $user->state_id = trim($request->info_state);
            $user->city_id = trim($request->info_city);
            $user->zipcode = trim($request->zipcode);
            $user->save();
            return redirect('/admin/account')->with(['pstatus' => 'success', 'pmessage' => 'your details updated successfully!']);
        } catch (\Exception $e) {
            return back()->with(['pstatus' => 'danger', 'pmessage' => $e->getMessage()]);
        }
    }
    /**
     * editAccountPassword for update new password
     *
     * @return true / false
     */
    public function editAccountPassword(Request $request)
    {
        $rules = [
            'password' => 'required|string|min:6|confirmed',
            'currentPassword' => 'required|',
        ];
        $messages = [
            'password.required' => 'New Password is required.',
            'password.min' => 'New password should contain at least 6 characters.',
            'currentPassword.required' => 'Current password is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $current_password = Auth::User()->password;
            if (Hash::check($request->currentPassword, $current_password)) {
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt(trim($request->password));
                $user->save();
                return redirect('/admin/account')->with(['status' => 'success', 'message' => 'your password updated successfully!']);
            } else {
                return back()->with(['status' => 'danger', 'message' => 'current password not match with our record, please try again.']);
            }
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}
