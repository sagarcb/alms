<?php

namespace App\Http\Middleware;

use Closure;

class DeptAdmin
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
        if (session()->has('dept_admin_login_status') == 1){
            return $next($request);
        }else{
            return redirect('/deptadmin/login');
        }
    }
}
