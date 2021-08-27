<?php

namespace App\Http\Controllers\DeptAdmin;

use App\Http\Controllers\Controller;
use App\Model\DeptAdmin;
use App\Model\DeptInfo;
use App\Model\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function viewNotice()
    {
        $dept_admin_id = session('dept_admin_id');
        $notices = Notice::where('dept_admin_id',$dept_admin_id)->latest()->get();
        return view('deptAdmin.notice.notice-view',compact('notices'));
    }

    public function createNotice()
    {
        return view('deptAdmin.notice.notice-add');
    }

    public function storeNotice(Request $request)
    {
        $this->validate($request, [
            'notice_name' => 'required',
            'notice_date' => 'required',
            'notice_details' => 'required'
        ]);
        $deptAdminId = session('dept_admin_id');
        $deptAdmin = DeptAdmin::where('id',$deptAdminId)->first();
        $deptInfoId = DeptInfo::select('id')->where('dept_code',$deptAdmin->dept_code)->first();
        $notice = new Notice();
        $notice->notice_name = $request->notice_name;
        $notice->notice_date = $request->notice_date;
        $notice->notice_details = $request->notice_details;
        $notice->dept_info_id = $deptInfoId->id;
        $notice->dept_admin_id = $deptAdminId;
        $notice->save();

        return redirect()->route('notice.view')->with('success','Notice Successfully Created!!');
    }

    public function editNotice(Notice $notice)
    {
        return view('deptAdmin.notice.notice-edit',compact('notice'));
    }

    public function updateNotice(Request $request, Notice $notice)
    {
        $this->validate($request, [
            'notice_name' => 'required',
            'notice_date' => 'required',
            'notice_details' => 'required'
        ]);

        $notice->update($request->all());
        return redirect()->route('notice.view')->with('success','Notice successfully Updated!!');
    }

    public function deleteNotice(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notice.view')->with('delete','Notice successfully Deleted!!');
    }
}
