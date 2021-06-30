<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FooterModel;
use Crypt;
use DataTables;
use Mail;
use Redirect;
use Validator;
use App\Role;
use App\User;

class FooterMenuManagementController extends Controller
{
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
            'pageName' => 'Footer Menu Listing',
            'activeMenu' => 'footer-menu-management',
        );
        $data['roles'] = Role::get();
        return view('admin.footerMenu.footer-menu-listing', $result);
    }

    public function menuData()
    {
        $userList = FooterModel::orderBy('id', 'desc')->get();
        //dd($userList);

        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/admin/footer-menu-management/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                <a data-id =' . Crypt::encrypt($userList->id) . ' class="btn btn-xs btn-danger delete" style="color:#fff"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                ';
            })->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editViewPlan($id)
    {
        // dd($id);
        try {
            $plan = FooterModel::find(Crypt::decrypt($id));
            $data = array(
                'pageName' => 'Edit Footer Menu',
                'activeMenu' => 'footer-menu-management',
                'planData' => $plan,
            );

            $data['roles'] = Role::get();
            return view('admin.footerMenu.footer_menu_edit', $data);
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFooterMenu()
    {
        $result = array(
            'pageName' => 'New Footer Menu',
            'activeMenu' => 'footer-menu-management',
        );
        return view('admin.footerMenu.add_footer_menu_create', $result);
        
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
            'section' => 'required',
            'menu_name' => 'required',
            'link' => 'required',
        ];
        
        $messages = [
            'section.required' => 'section is required.',
            'menu_name.required' => 'menu_name is required.',
            'link.required' => 'link is required.',
            'plan_name.min' => 'First name should contain at least 4 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $planData = FooterModel::create([
                'section' => $request->section,
                'menu_name' => $request->menu_name,
                'link' => $request->link,
            ]);
            
            
            return redirect('/admin/footer-menu-management/')->with(['status' => 'success', 'message' => 'Create New Footer Menu Created successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        // dd($request->all());
        $rules = [
            'section' => 'required',
            'menu_name' => 'required',
            //'link' => 'required',
        ];
        $messages = [
            'section.required' => 'section is required.',
            'menu_name.required' => 'menu name is required.',
            'link.required' => 'link is required.',
            'last_name.min' => 'First name should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            // dd($request->all());
            $user = FooterModel::find($id);
            // dd($user);
            $user->section = $request->section;
            $user->menu_name = $request->menu_name;
            $user->link = $request->link;
            $user->save();
            return redirect('/admin/footer-menu-management/')->with(['status' => 'success', 'message' => 'Update record successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
            //    return back()->with(['status' => 'danger', 'message' => 'Some thing went wrong! Please try again later.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        FooterModel::find(Crypt::decrypt($id))->delete();
    }
}
