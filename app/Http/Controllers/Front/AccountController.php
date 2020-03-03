<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array(
            'pageName' => 'User Listing',
            'activeMenu' => 'user-management',
        );

        $data['roles'] = Role::get();

        return view('front.users.create-step1', $result);

    }
    public function postCreateStep1(Request $request)
    {

        // $rules = [
        //     'first_name' => 'required|min:2',
        //     'last_name' => 'required|min:2',
        //     'name' => 'required',
        //     'email' => 'required',
        // ];

        // $messages = [
        //     'first_name.required' => 'Your first name is required.',
        //     'first_name.min' => 'First name should contain at least 2 characters.',
        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        // try {

        $userData = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        $roleArray = array(
            'user_id' => $userData->id,
            'role_id' => 2, // customer role Id
        );
        /* UserRoleRelation::insert($roleArray); */
        DB::table('role_user')->insert($roleArray);
        $request->session()->put('userData', $userData);

        // dd($userData);
        return redirect('/front/create-step2');

        //return redirect('/admin/account')->with(['pstatus' => 'success', 'pmessage' => 'your details updated successfully!']);

        // } catch (\Exception $e) {

        //     return back()->with(['pstatus' => 'danger', 'pmessage' => $e->getMessage()]);
        // }

        // return redirect('/front/create-step2');

        //dd($request->all());
    }

    public function createStep2(Request $request)
    {
        $userData = $request->session()->get('userData');
        //$product = $request->session()->get('product');
        return view('front.users.create-step2', compact('userData', $userData));
    }

    public function postCreateUpdate(Request $request)
    {
        $userData = User::find($request->user_id);
        $userData->accountType = trim($request->accountType);
        $userData->save();
        $userData = User::find($request->user_id);
        $userData = $request->session()->get('userData');
        return view('front.users.create-step3', compact('userData', $userData));
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
