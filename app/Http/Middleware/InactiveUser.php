<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class InactiveUser
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
        if (Auth::user() &&  Auth::user()->type == 3 && (Auth::user()->status==1 || Auth::user()->status==2)) {
            return $next($request);
       }

       return redirect('user')->with('error','You are not approved by admin');
    }
}
