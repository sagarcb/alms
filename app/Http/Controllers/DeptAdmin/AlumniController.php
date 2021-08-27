<?php

namespace App\Http\Controllers\DeptAdmin;

use App\Http\Controllers\Controller;
use App\Mail\AlumniApproval;
use App\Model\AlumniBasicInfo;
use App\Model\DeptAdmin;
use App\Model\DeptInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlumniController extends Controller
{
    public function newRegister()
    {
        $deptAdmin = DeptAdmin::where('id',session('dept_admin_id'))->first();
        $deptInfoId = DeptInfo::select('id')->where('dept_code',$deptAdmin->dept_code)->first();
        $alumnis = AlumniBasicInfo::where('email_verification_status',1)
                        ->where('approve_status',0)
                        ->where('dept_info_id',$deptInfoId->id)->latest()->get();
        return view('deptAdmin.alumni.alumni-request-view',compact('alumnis'));
    }

    public function approvedAlumni()
    {
        $deptAdmin = DeptAdmin::where('id',session('dept_admin_id'))->first();
        $deptInfoId = DeptInfo::select('id')->where('dept_code',$deptAdmin->dept_code)->first();
        $alumnis = AlumniBasicInfo::where('email_verification_status',1)
            ->where('approve_status',1)
            ->where('dept_info_id',$deptInfoId->id)->latest()->get();
        return view('deptAdmin.alumni.alumni-approved-view',compact('alumnis'));
    }

    public function approveStatusUpdate(AlumniBasicInfo $alumni)
    {
        $alumni->approve_status = 1;
        $alumni->save();
        $details = [
            'name' => $alumni->name,
            'status' => 1
        ];
        Mail::to($alumni->email_id)->send(new AlumniApproval($details));
        return response()->json('Alumni request Approved');
    }
}
