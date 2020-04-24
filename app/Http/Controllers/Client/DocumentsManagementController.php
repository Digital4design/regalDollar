<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DocumentManagemetModel;
use App\Models\InvestmentModel;
use Crypt;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentsManagementController extends Controller
{
    /**
     * Display a listing of the resource. 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = array(
            'pageName' => 'Documents Listing',
            'activeMenu' => 'documents', 
        );
        return view('client.documentManagemet.documents-listing', $result);

    }

    public function documentsData()
    {
        $investmentData = InvestmentModel::select('plan_id')->distinct()->where('user_id', Auth::user()->id)->get();
        $plan =array();
        foreach($investmentData as $invest){
            array_push($plan,$invest['plan_id']);
        }
        // dd($plan);
        //$List = implode(',', $plan);
         
        $userList = DocumentManagemetModel::whereIn('plan_id', $plan)->get();
        // dd($userList);
        return Datatables::of($userList)
            ->addColumn('action', function ($userList) {
                return '<a href ="' . url('/client/documents/view') . '/' . Crypt::encrypt($userList->id) . '"  class="btn btn-xs btn-primary view"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View</a>';
            })->make(true);
    }

    public function singleDocuments($id, Request $request)
    {
        $documentData = DocumentManagemetModel::find(\Crypt::decrypt($id));
        $result = array(
            'pageName' => 'Documents View',
            'activeMenu' => 'documents',
            'documentData' =>$documentData,
        );
        return view('client.documentManagemet.docs_view', $result);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
