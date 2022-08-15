<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
class CheckUserAuthenticated
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
        if(empty(Session::has('frontSession'))){
            return redirect('/user/login')->with('flash_message_success', 'کاربر گرامی لطفا ابتدا وارد سایت شوید!!!');;
        }
        return $next($request);
    }
}
