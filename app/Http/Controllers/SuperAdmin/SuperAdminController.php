<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superAdmin.dashboard.dashboard');
    }

    public function authenticate(Request $request)
    {
        $admin = Admin::where('admin_id',$request->admin_id)->first();
        if (!empty($admin)){
            if (Hash::check($request->password,$admin->password)){
                session()->put('admin_login_status',1);
                return redirect()->route('superAdmin.dashboard');
            }else{
                return redirect('/admin/login')->with('error','* password was incorrect');
            }
        }else{
            return redirect('/admin/login')->with('error','* admin id or password was incorrect');
        }
    }

    public function logout()
    {
        session()->forget('admin_login_status');
        return redirect('/admin/login');
    }
}
