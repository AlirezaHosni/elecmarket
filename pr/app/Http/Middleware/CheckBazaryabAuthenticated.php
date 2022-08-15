<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
class CheckBazaryabAuthenticated
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
        if(empty(Session::has('bazaryabSession'))){
            return redirect('/user/login')->with('flash_message_success', 'کاربر گرامی لطفا ابتدا وارد سایت شوید!!!');;
        }
        return $next($request);
    }
}
