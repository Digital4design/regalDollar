<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   /** 
		 * login api 
		 * 
		 * @return \Illuminate\Http\Response 
		 */ 
	public function login(Request $request){
		try{
				
			$validator	=	Validator::make($request->all(), [ 
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6', ],                
                
							]);
						
			if ($validator->fails()){ 
				return redirect()->back()->withErrors($validator)->withInput();           
			}

			if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
				
				$userData = Auth::user(); 
                //print_r($userData);
                return redirect('/home');
			} 
			else{ 
				return redirect()->back()->with(['status' => 'danger' , 'message' => 'Invalid Details, please try again.']);
			} 
		
		}
		catch(\Exception $e){
				// return exception
               return redirect()->back()->with(['status' => 'danger' , 'message' => $e->getMessage()]);
		}
					
			
	}

}
