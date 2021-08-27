<?php

namespace App\Http\Controllers\DeptAdmin;

use App\Http\Controllers\Controller;

class DeptAdminController extends Controller
{
    public function index()
    {
        return view('/deptAdmin/layout/master');
    }

    public function logout()
    {
        session()->forget('dept_admin_login_status');
        return redirect()->route('deptadmin.login');
    }
}
