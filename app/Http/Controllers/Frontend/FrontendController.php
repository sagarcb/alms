<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\AlumniBasicInfo;
use App\Model\Event;
use App\Model\Notice;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $alumniId = session('alumni_id');
        $alumniBasic = AlumniBasicInfo::find($alumniId);
        $eventsCount = Event::where('dept_info_id',$alumniBasic->dept_info_id)->count();
        $events = Event::where('dept_info_id',$alumniBasic->dept_info_id)->latest()->take(3)->get();
        $noticesCount = Notice::where('dept_info_id',$alumniBasic->dept_info_id)->count();
        $notices = Notice::where('dept_info_id',$alumniBasic->dept_info_id)->latest()->take(3)->get();
        return view('frontend.index',
            compact('alumniBasic','eventsCount','events','notices','noticesCount'));
    }

    //Show the events list
    public function eventsList()
    {
        $alumniId = session('alumni_id');
        $alumni = AlumniBasicInfo::find($alumniId);
        $events = Event::where('dept_info_id',$alumni->dept_info_id)->latest()->paginate(3);
        return view('frontend.events.events-list',compact('events'));
    }

    //Show an event detail
    public function eventDetails(Event $event)
    {
        return view('frontend.events.event-details',compact('event'));
    }
    //Show the notice list
    public function noticeList()
    {
        $alumniId = session('alumni_id');
        $alumni = AlumniBasicInfo::find($alumniId);
        $notices = Notice::where('dept_info_id',$alumni->dept_info_id)->latest()->paginate(3);
        return view('frontend.notices.notice-list',compact('notices'));
    }

    //Show the notice details
    public function noticeDetails(Notice $notice)
    {
        return view('frontend.notices.notice-details',compact('notice'));
    }
}
