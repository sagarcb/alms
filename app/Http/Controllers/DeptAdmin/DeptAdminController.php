<?php

namespace App\Http\Controllers\DeptAdmin;

use App\Http\Controllers\Controller;
use App\Model\DeptAdmin;
use Illuminate\Http\Request;


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

    public function profile(DeptAdmin $deptAdmin)
    {
        return view('deptAdmin.profile.profile',compact('deptAdmin'));
    }

    public function updateProfile(Request $request, DeptAdmin $deptAdmin)
    {
        $deptAdmin->name = $request->name;
        $deptAdmin->save();
        return response()->json($deptAdmin);
    }

}
