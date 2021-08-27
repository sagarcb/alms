<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\DeptAdmin;
use App\Model\DeptInfo;
use Illuminate\Http\Request;

class CreateAdminController extends Controller
{
    public function index()
    {
        $admins = DeptAdmin::all();
        return view('superAdmin.manage-admin.admin-view',compact('admins'));
    }

    public function createAdmin()
    {
        $deptCode = DeptInfo::all();
        return view('superAdmin.manage-admin.admin-create',compact('deptCode'));
    }

    public function storeAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dept_admin_id' =>'required|unique:dept_admins,dept_admin_id',
            'password' => 'required|min:6|max:12',
            'dept_code' => 'required'
        ]);

        DeptAdmin::create($request->all());
        return redirect()->route('admin.list')->with('success','Admin Created Successfully!!!');
    }

    public function deleteAdmin(DeptAdmin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.list')->with('delete','Successfully Deleted!!!');
    }

    public function statusUpdate(Request $request, DeptAdmin $admin)
    {
        $admin->dept_admin_status = $request->dept_admin_status;
        $admin->save();
        return response()->json('Status Successfully Updated!!');
    }

    public function passwordReset(Request $request, DeptAdmin $deptAdmin)
    {
        $deptAdmin->update(['password' => $request->password]);
        return response()->json('Password Reset Completed', 200);
    }
}
