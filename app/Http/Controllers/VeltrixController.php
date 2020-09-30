<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CmsPages;
use App\Models\FooterModel;
use App\Models\FooterContent;

class VeltrixController extends Controller{
    /**
     *  Display a listing of the resource.
     *  @return \Illuminate\Http\Response
     * */

    public function index($id)
    {
		$result = array('pageclass'=>$id);
		$result['footerdata'] = FooterModel::get();
		$result['sectiondata'] = FooterModel::select('section')->distinct()->get();
		$result['footerContent'] = FooterContent::get()->toArray();
		
		$pageData = CmsPages::where('page_slug', $id)
                            ->where('status','Active')
                            ->orderBy('created_at', 'DESC')
                            ->first();
							
     						
		if(!empty($pageData)){
			
			$result['pageData'] = $pageData;
			
			return view('cms_pages',$result);
			
		}else if (view()->exists($id)) {
            
            return view($id,$result);
        } else {
            return view('pages-404');
		}

    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     * */

    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *  @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */

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

