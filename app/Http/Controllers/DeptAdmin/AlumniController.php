<?php

namespace App\Http\Controllers\DeptAdmin;

use App\Http\Controllers\Controller;
use App\Mail\AlumniApproval;
use App\Model\AlumniBasicInfo;
use App\Model\AlumniJobInfo;
use App\Model\DeptAdmin;
use App\Model\DeptInfo;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

    public function approveStatusUpdate(Request $request, AlumniBasicInfo $alumni)
    {
        $alumni->approve_status = $request->approve_status;
        $alumni->save();
        $details = [
            'name' => $alumni->name,
            'status' => $request->approve_status
        ];
        Mail::to($alumni->email_id)->send(new AlumniApproval($details));
        if ($request->approve_stats == 1){
            return response()->json('Alumni request Approved');
        }else{
            return response()->json('Alumni request Dis Approved');
        }
    }

    public function cvList()
    {
        $deptAdmin = DeptAdmin::where('id',session('dept_admin_id'))->first();
        $deptInfoId = DeptInfo::select('id')->where('dept_code',$deptAdmin->dept_code)->first();
        $alumnis = AlumniBasicInfo::where('email_verification_status',1)
            ->where('approve_status',1)
            ->where('dept_info_id',$deptInfoId->id)->latest()->get();
        return view('deptAdmin.alumni.alumni-cv',compact('alumnis'));
    }

    public function cvDownload($alumni)
    {
        $alumniBasic = AlumniBasicInfo::where('alumni_id',$alumni)->first();
        $file = public_path()."/cv_list/".$alumniBasic->alumniJobInfo->cv_link;
        $headers = array('Content-Type: application/pdf',);
        //return Response::download($file, 'info.pdf',$headers);
        return response()->download($file,$alumniBasic->alumniJobInfo->cv_link,$headers);
        //return response()->download(asset('/public/cv_list/'.$alumniBasic->alumniJobInfo->cv_link));
    }

    public function alumniposts()
    {
        $deptAdmin = DeptAdmin::where('id',session('dept_admin_id'))->first();
        $deptInfoId = DeptInfo::select('id')->where('dept_code',$deptAdmin->dept_code)->first();
        $posts = Post::where('dept_info_id',$deptInfoId->id)->get();
        return view('deptAdmin.alumni.posts',compact('posts'));
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return back()->with('delete','Post deleted successfully!!!');
    }
}
