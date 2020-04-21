<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FQAModel;
use App\Role;
use Crypt;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class FQAManagementController extends Controller
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
            'pageName' => 'FQA Listing',
            'activeMenu' => 'fqa-management',
        );
        $data['roles'] = Role::get();
        return view('admin.fqa.fqa-listing', $result);
    }
    public function FQAData()
    {
        $userList = FQAModel::orderBy('id', 'desc')->get();
        // dd($userList);
        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/admin/fqa-management/edit') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
				<a data-id =' . Crypt::encrypt($userList->id) . ' class="btn btn-xs btn-danger delete" style="color:#fff"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';
            })->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createViewFQA()
    {
        $result = array(
            'pageName' => 'New FQA',
            'activeMenu' => 'fqa-management',
        );
        return view('admin.fqa.fqa_create', $result);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'fqaHeadding' => 'required',
            'fqaAnswer' => 'required',
            'fqa_type' => 'required',
        ];
        $messages = [
            'fqaHeadding.required' => 'FQA name is required.',
            'qaAnswer.min' => 'First name should contain at least 4 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $planData = FQAModel::create([
                'fqaHeadding' => $request->fqaHeadding,
                'fqaAnswer' => $request->fqaAnswer,
                'fqa_type'=>$request->fqa_type,
            ]);
            
            return redirect('/admin/fqa-management')->with(['status' => 'success', 'message' => 'Create New FQA Created successfully.']);
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
    public function editViewFQA($id)
    {
        try {
            $plan = FQAModel::find(Crypt::decrypt($id));
            $data = array(
                'pageName' => 'Edit FQA',
                'activeMenu' => 'fqa-management',
            );
            $data['planData'] = $plan;
            $data['roles'] = Role::get();
            //dd($data);

            return view('admin.fqa.fqa_edit', $data);
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
    public function updateFQA(Request $request, $id)
    {
        //dd($request->all());
        $rules = [
            'fqaHeadding' => 'required',
            'fqaAnswer' => 'required',
            'fqa_type' => 'required',
        ];
        $messages = [
            'fqaHeadding.required' => 'Your first name is required.',
            'fqaHeadding.min' => 'First name should contain at least 2 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            
            $fqaData = FQAModel::find(\Crypt::decrypt($id));
            $fqaData->fqaHeadding= trim($request->fqaHeadding);
            $fqaData->fqaAnswer = trim($request->fqaAnswer);
            $fqaData->fqa_type =$request->fqa_type;
            $fqaData->save();
           
            return redirect('/admin/fqa-management/')->with(['status' => 'success', 'message' => 'Update record successfully.']);
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
        FQAModel::find(Crypt::decrypt($id))->delete();
    }
}
