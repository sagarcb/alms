<?php

namespace App\Http\Middleware;

use Closure;

class Alumni
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
        if (session()->has('alumni_login_status') && session('alumni_login_status') == 1){
            return $next($request);
        }else{
            return redirect()->route('alumni.login')->with('error','You are not logged in!');
        }
    }
}
