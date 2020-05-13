<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Models\DocumentManagemetModel;
use DataTables;
use Crypt;
use DB;
use App\User;
use Validator;


class DocumentsManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array(
            'pageName' => 'Documents Listing',
            'activeMenu' => 'documents-management',
        );
        $data['roles'] = Role::get();
        return view('admin.documentsManagement.documents-listing', $result);
    }

    public function documentsData()
    {
        // $userList = DocumentManagemetModel::orderBy('id', 'desc')->get();
        $userList = DB::table('documents_management')
            ->select('documents_management.*', 'users.name')
            ->join('users', 'users.id', '=', 'documents_management.users_id')
            ->get();
            //dd($userList);
        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/admin/documents-management/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
				<a data-id =' . Crypt::encrypt($userList->id) . ' class="btn btn-xs btn-danger delete" style="color:#fff"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';
            })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDocuments()
    {
        $clients = User::whereHas('roles', function ($q) {
                $q->where('name', 'client');
            })->get()->toArray();
        $result = array(
            'pageName' => 'New Documents',
            'activeMenu' => 'documents-management',
            'clients' => $clients,
        );
        // dd($result);
        return view('admin.documentsManagement.documents_create', $result);
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
            'users_id' => 'required',
            'documents_title' => 'required',
            'message' => 'required',
        ];
        $messages = [
            'documents_title.required' => 'documents name is required.',
            'documents_title.min' => 'documents name should contain at least 4 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $planData = DocumentManagemetModel::create([
                'users_id' => $request->users_id,
                'documents_title' => $request->documents_title,
                'message' => $request->message,
            ]);
            if ($request->documents_path != "") {
                $plan_save = DocumentManagemetModel::where('id', $planData->id)->first();
                if ($plan_save->documents_path != "") {
                    if (file_exists(public_path('/uploads/documents_management/' . $plan_save->documents_path))) {
                        $del_previous_pic = unlink(public_path('/uploads/documents_management/' . $plan_save->documents_path));
                    }
                }
                $file = $request->file('documents_path');
                $filename = 'docs-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/uploads/documents_management', $filename);
                $plan_save->documents_path = $filename;
                $plan_save->save();
            }
            return redirect('/admin/documents-management/')->with(['status' => 'success', 'message' => 'Create New docs successfully.']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editViewDocs($id)
    {
        
        try {
            $document = DocumentManagemetModel::find(Crypt::decrypt($id));
            
            $clients = User::whereHas('roles', function ($q) {
                $q->where('name', 'client');
            })->get()->toArray();
            // dd($data['clients']);
            $data = array(
                'pageName' => 'Edit Docs',
                'activeMenu' => 'documents-management',
                'clients'=>$clients,
            );
            $data['documentData'] = $document;
            $data['roles'] = Role::get();
            
            return view('admin.documentsManagement.document_edit', $data);
        } catch (\Exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDocs(Request $request, $id)
    {
        $rules = [
            'users_id' => 'required',
            'documents_title' => 'required',
            'message' => 'required',
            'documents_path' => 'required',
        ];
        $messages = [
            'documents_title.required' => 'documents title is required.',
            'message.min' => 'message should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $planData = DocumentManagemetModel::find(\Crypt::decrypt($id));
            $planData->users_id = trim($request->users_id);
            $planData->documents_title = trim($request->documents_title);
            $planData->message = trim($request->message);
            $planData->save();
            if ($request->documents_path != "") {
                $plan_save = DocumentManagemetModel::where('id', $planData->id)->first();
                if ($plan_save->icon != "") {
                    if (file_exists(public_path('/uploads/documents_management/' . $plan_save->documents_path))) {
                        $del_previous_pic = unlink(public_path('/uploads/documents_management/' . $plan_save->documents_path));
                    }
                }
                $file = $request->file('documents_path');
                $filename = 'docs-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/uploads/documents_management', $filename);
                $plan_save->documents_path = $filename;
                $plan_save->save();
            }
            return redirect('/admin/documents-management/')->with(['status' => 'success', 'message' => 'Update record successfully.']);
        } catch (\exception $e) {
            return back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
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
        DocumentManagemetModel::find(Crypt::decrypt($id))->delete();
    }
}
