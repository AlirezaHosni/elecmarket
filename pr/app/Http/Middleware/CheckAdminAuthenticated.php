<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
class CheckAdminAuthenticated
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
        $user = $request->user();
        if($user && $user->banned ==1 && Auth::user()->is_admin == 1){
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/banned/');
        }
        if(empty(Session::has('adminSession'))){
            return redirect('/ad/login');
        }
        return $next($request);
    }
}
