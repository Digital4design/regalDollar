<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use DB;
use DataTables;
use App\User;
use Crypt;
use Auth;
use App\Role;

class NotificationsManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificationList = auth()->user()->readnotifications;
        $result = array(
            'pageName' => 'Notification Listing',
            'activeMenu' => 'notifications-managment',
            'notificationList'=>$notificationList,
        );
        
        return view('admin.noticationsView.index', $result);
        
    }
    public function notificationData(){
        
        $userList = auth()->user()->readnotifications;
        // dd($userList);
        // return Datatables::of($userList)
        //     ->addColumn('action', function ($userList) {
        //         return '<a href ="' . url('/admin/withdraw-request-managment/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
        //     })->make(true);


          
        return Datatables::of($userList)
            ->addColumn('message', function ($userList){
                // return "jhgjhgjh";
                  return $userList['data'];
        })->make(true);
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
