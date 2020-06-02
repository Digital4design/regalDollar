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
        $notificationList = auth()->user()->notifications;
        $result = array(
            'pageName' => 'Notification Listing',
            'activeMenu' => 'notifications-managment',
            'notificationList'=>$notificationList,
        );
        return view('admin.noticationsView.index', $result);
    }
    public function notificationData(){
        
        $userList = auth()->user()->readnotifications;
        return Datatables::of($userList)
            ->addColumn('message', function ($userList){
                return $userList['data'];
        })->make(true);
    }
    
}
