<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Model\DeptInfo;
use Illuminate\Http\Request;

class DeptInfoController extends Controller
{
    public function index()
    {
        $depts = DeptInfo::all();
        return view('superAdmin.dept-info.dept-view',compact('depts'));
    }

    public function createDept()
    {
        return view('superAdmin.dept-info.dept-add');
    }

    public function storeDept(Request $request)
    {
        $this->validate($request, [
           'dept_code' => 'required|unique:dept_infos,dept_code',
           'dept_name' => 'required',
           'faculty_name' => 'required'
        ]);

        DeptInfo::create($request->all());
        return redirect()->route('dept.list')->with('success','Successfully Created!!!');
    }

    public function editDept(DeptInfo $dept)
    {
        return view('superAdmin.dept-info.dept-edit',compact('dept'));
    }

    public function updateDept(Request $request, DeptInfo $dept)
    {
        $this->validate($request, [
            'dept_code' => 'required|unique:dept_infos,dept_code,'.$dept->id,
            'dept_name' => 'required',
            'faculty_name' => 'required'
        ]);

        $dept->update($request->all());
        return redirect()->route('dept.list')->with('success','Department Successfully Updated!!!');
    }

    public function deleteDept(DeptInfo $dept)
    {
        $dept->delete();
        return redirect()->route('dept.list')->with('delete','Department Successfully Deleted!!!');
    }
}
