<?php

namespace App\Http\Controllers\DeptAdmin;

use App\Http\Controllers\Controller;
use App\Model\DeptAdmin;
use App\Model\DeptInfo;
use App\Model\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function viewEvent()
    {
        $dept_admin_id = session('dept_admin_id');
        $events = Event::where('dept_admin_id',$dept_admin_id)->latest()->get();
        return view('deptAdmin.event.event-view',compact('events'));
    }

    public function createEvent()
    {
        return view('deptAdmin.event.event-add');
    }

    public function storeEvent(Request $request)
    {
        $this->validate($request, [
            'event_name' => 'required',
            'event_date' => 'required',
            'event_details' => 'required'
        ]);
        $deptAdminId = session('dept_admin_id');
        $deptAdmin = DeptAdmin::where('id',$deptAdminId)->first();
        $deptInfoId = DeptInfo::select('id')->where('dept_code',$deptAdmin->dept_code)->first();
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->event_details = $request->event_details;
        $event->dept_info_id = $deptInfoId->id;
        $event->dept_admin_id = $deptAdminId;
        $event->save();

        return redirect()->route('event.view')->with('success','Event Successfully Created!!');
    }

    public function editEvent(Event $event)
    {
        return view('deptAdmin.event.event-edit',compact('event'));
    }

    public function updateEvent(Request $request, Event $event)
    {
        $this->validate($request, [
            'event_name' => 'required',
            'event_date' => 'required',
            'event_details' => 'required'
        ]);

        $event->update($request->all());
        return redirect()->route('event.view')->with('success','Event successfully Updated!!');
    }

    public function deleteEvent(Event $event)
    {
        $event->delete();
        return redirect()->route('event.view')->with('delete','Event successfully Deleted!!');
    }
}
