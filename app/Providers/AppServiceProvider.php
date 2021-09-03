<?php

namespace App\Providers;

use App\Model\AlumniBasicInfo;
use App\Model\AlumniPersonalInfo;
use App\Model\DeptAdmin;
use App\Model\Event;
use App\Model\Notice;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('deptAdmin.layout.header', function ($view){
            $id = session('dept_admin_id');
            $deptadmin = DeptAdmin::find($id);
            $view->with('deptadmin',$deptadmin);
        });

        View::composer('frontend.layout.master', function ($view){
            $alumniId = session('alumni_id');
            $alumniBasic = AlumniBasicInfo::find($alumniId);
            $eventsCount = Event::where('dept_info_id',$alumniBasic->dept_info_id)->count();
            $events = Event::where('dept_info_id',$alumniBasic->dept_info_id)->latest()->take(3)->get();
            $noticesCount = Notice::where('dept_info_id',$alumniBasic->dept_info_id)->count();
            $notices = Notice::where('dept_info_id',$alumniBasic->dept_info_id)->latest()->take(3)->get();
            $profilePic = AlumniPersonalInfo::select('photo_link')->where('alumni_id',$alumniBasic->alumni_id)->first();
            $view->with('alumniBasic',$alumniBasic)->with('eventsCount',$eventsCount)->with('events',$events)
                    ->with('noticesCount',$noticesCount)->with('notices',$notices)->with('profilePic',$profilePic);

        });
    }
}
