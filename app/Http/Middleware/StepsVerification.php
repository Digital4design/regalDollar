<?php

namespace App\Http\Middleware;

use Closure;

class StepsVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::check() && Auth::user()->isPayment() ){
            // dd("Here");
			return $next($request);
		}
		else{
			Auth::logout();
			return redirect('/');
	    }
		
		// $Role = Auth::user()->roles->first();
		// return redirect('/'.$Role->name);
        return $next($request);
    }
}
