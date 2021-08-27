<?php

namespace App\Http\Controllers\DeptAdmin;

use App\Http\Controllers\Controller;
use App\Model\DeptAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeptAdminLoginController extends Controller
{
    public function index()
    {
        return view('deptAdmin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $deptAdmin = DeptAdmin::where('dept_admin_id',$request->dept_admin_id)->first();
        if (!empty($deptAdmin)){
            if ($request->password == $deptAdmin->password){
                if ($deptAdmin->dept_admin_status == 0){
                    return redirect('/deptadmin/login')->with('error','* You are not authorized to login');
                }else{
                    session()->put('dept_admin_login_status',1);
                    session()->put('dept_admin_id',$deptAdmin->id);
                    return redirect()->route('deptadmin.dashboard');
                }
            }else{
                return redirect('/deptadmin/login')->with('error','* password was incorrect');
            }
        }else{
            return redirect('/deptadmin/login')->with('error','* Dept admin id or password was incorrect');
        }
    }

    public function logout()
    {
        session()->forget('dept_admin_login_status');
        return redirect()->route('deptadmin.login');
    }
}
