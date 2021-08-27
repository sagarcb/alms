<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Model\DeptInfo;
use App\Model\ProgramInfo;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = ProgramInfo::latest()->get();
        return view('superAdmin.program.program-view',compact('programs'));
    }

    public function createProgram()
    {
        $dept = DeptInfo::all();
        return view('superAdmin.program.program-create',compact('dept'));
    }

    public function storeProgram(Request $request)
    {
        $this->validate($request, [
           'dept_info_id' => 'required',
           'program_id' => 'required',
           'program_title' => 'required'
        ]);

        ProgramInfo::create($request->all());
        return redirect()->route('program.list')
            ->with('success','Program Created Successfully!!!');
    }

    public function editProgram(ProgramInfo $program)
    {
        $dept = DeptInfo::all();
        return view('superAdmin.program.program-edit',compact('program','dept'));
    }

    public function updateProgram(ProgramInfo $program, Request $request)
    {
        $this->validate($request, [
            'dept_info_id' => 'required',
            'program_id' => 'required',
            'program_title' => 'required'
        ]);
        $program->update($request->all());
        return redirect()->route('program.list')->with('success','Program Successfully Updated!!!');
    }

    public function deleteProgram(ProgramInfo $program)
    {
        $program->delete();
        return redirect()->route('program.list')->with('delete','Program Successfully Deleted!!!');

    }

}
