<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Frontend Routing starts
Route::namespace('Frontend')->group(function (){
    Route::get('/login','Auth\LoginController@index')->name('alumni.login');
    Route::post('/login','Auth\LoginController@authentication');
    //alumni registration
    Route::get('/register','Auth\LoginController@registerFormView')->name('alumni.register');
    Route::post('/register','Auth\LoginController@store');
    Route::get('/email-verify','Auth\LoginController@emailVerify')->name('email.verify');
    Route::post('/email-verify','Auth\LoginController@storeVerifiedAlumni');
    //Alumni Registration ends

    //alumni password reset
    Route::get('/enter-email','Auth\LoginController@enterEmailPage')->name('email.enterEmail');
    Route::post('/enter-email','Auth\LoginController@verifyEmail');
    Route::get('/verification-code','Auth\LoginController@verifyCodePage')->name('enter.verificationCode');
    Route::post('/verification-code','Auth\LoginController@verifyCode');
    Route::get('/reset-password','Auth\LoginController@resetPasswordPage')->name('reset.password');
    Route::post('/reset-password','Auth\LoginController@resetPassword');
    //Route::post('/reset-password','Auth\LoginController@rest')

    Route::middleware('alumni')->group(function (){
        Route::get('/','FrontendController@index')->name('frontend.home');
        Route::get('/{alumni}/profile','AlumniProfileController@index')->name('alumni.profile');
        Route::get('/{alumni}/logout','Auth\LoginController@logout')->name('alumni.logout');
        Route::get('/events','FrontendController@eventsList')->name('events.list');
        Route::get('/event/{event}/details','FrontendController@eventDetails')->name('event.details');
        Route::get('/notices','FrontendController@noticeList')->name('notice.list');
        Route::get('/notice/{notice}/details','FrontendController@noticeDetails')->name('notice.details');

        //Alumni basic info ajax requests
        Route::get('/{alumni}/basic-details','AlumniProfileController@basicInfoDetails');
        Route::post('/{alumni}/basic-details/update','AlumniProfileController@updateBasicInfo');

        //Alumni Personal Info Ajax request
        Route::get('/{alumni_id}/personal-details','AlumniProfileController@personalInfoDetails');
        Route::post('/{alumni}/personal-details','AlumniProfileController@personalInfoUpdate');

        //Alumni Academic info ajax request
        Route::get('/{alumni_id}/academic-details','AlumniProfileController@academicInfoDetails');
        Route::post('/{alumni}/academic-details','AlumniProfileController@academicInfoUpdate');

        //Alumni Job info ajax request
        Route::get('/{alumni_id}/job-details','AlumniProfileController@jobInfoDetails');
        Route::post('/{alumni}/job-details','AlumniProfileController@jobInfoUpdate');

        //Alumni Post Route
        Route::post('/{alumni}/store-post','FrontendController@storePost')->name('post.store');
        Route::get('/{post}/post-details','FrontendController@postDetails')->name('post.details');
        Route::patch('/{post}/post-update','FrontendController@updatePost')->name('post.update');

        //alumni post ajax route
        Route::get('/{post}/post-details-ajax','AlumniProfileController@postDetailsAjax');
        Route::post('/{post}/post-update','AlumniProfileController@updatePost');
        Route::delete('/{post}/delete-post','AlumniProfileController@deletePost');

        //alumni others profile
        Route::get('/{post}/otherprofile','AlumniProfileController@otherProfile')->name('other.profile');
    });
});
//Frontend Routing Ends


Route::get('/admin/login', function (){
   return view('superAdmin.auth.login');
});
Route::post('/admin/authenticate','superAdmin\SuperAdminController@authenticate')->name('superAdmin.auth');
//Super Admin Routing
Route::prefix('admin')->middleware('superAdminLogin')->namespace('SuperAdmin')->group(function (){
    Route::get('/','SuperAdminController@index')->name('superAdmin.dashboard');

    //Adding Admin Routing Starts
    Route::get('/admin-list','CreateAdminController@index')->name('admin.list');
    Route::get('/create','CreateAdminController@createAdmin')->name('admin.create');
    Route::post('/create','CreateAdminController@storeAdmin');
    Route::delete('/{admin}/delete','CreateAdminController@deleteAdmin')->name('admin.delete');
    //Status Update Route
    Route::get('/{admin}/statusUpdate','CreateAdminController@statusUpdate');
    Route::post('/{deptAdmin}/passwordReset','CreateAdminController@passwordReset');
    //Adding Admin Routing ends

    //Department Info Routing Starts
    Route::get('/dept-list','DeptInfoController@index')->name('dept.list');
    Route::get('/dept-create','DeptInfoController@createDept')->name('dept.create');
    Route::post('/dept-create','DeptInfoController@storeDept');
    Route::get('/{dept}/dept-edit','DeptInfoController@editDept')->name('dept.edit');
    Route::patch('/{dept}/dept-update','DeptInfoController@updateDept')->name('dept.update');
    Route::delete('/{dept}/dept-delete','DeptInfoController@deleteDept')->name('dept.delete');
    //Department Info Routing Ends

    //Program Routing Starts
    Route::get('/program-list','ProgramController@index')->name('program.list');
    Route::get('/program-create','ProgramController@createProgram')->name('program.create');
    Route::post('/program-create','ProgramController@storeProgram');
    Route::get('/{program}/program-edit','ProgramController@editProgram')->name('program.edit');
    Route::patch('/{program}/program-update','ProgramController@updateProgram')->name('program.update');
    Route::delete('/{program}/program-delete','ProgramController@deleteProgram')->name('program.delete');
    //Program Routing Ends

    //Admin logout
    Route::get('/sadmin/logout','SuperAdminController@logout')->name('admin.logout');

});


//Dept admin routes
Route::prefix('deptadmin')->namespace('DeptAdmin')->group(function (){
    Route::get('/login','DeptAdminLoginController@index')->name('deptadmin.login');
    Route::post('/authenticate','DeptAdminLoginController@authenticate')->name('deptadmin.auth');

    Route::middleware('deptAdminLogin')->group(function (){
        Route::get('/','DeptAdminController@index')->name('deptadmin.dashboard');
        Route::get('/dadmin/logout','DeptAdminLoginController@logout')->name('deptadmin.logout');

        //Events CRUD ROUTES
        Route::prefix('event')->group(function (){
           Route::get('/view','EventController@viewEvent')->name('event.view');
           Route::get('/create','EventController@createEvent')->name('event.create');
           Route::post('/create','EventController@storeEvent');
           Route::get('/{event}/edit','EventController@editEvent')->name('event.edit');
           Route::patch('/{event}/update','EventController@updateEvent')->name('event.update');
           Route::delete('/{event}/delete','EventController@deleteEvent')->name('event.delete');
        });

        //NOTICE CRUD ROUTES
        Route::prefix('notice')->group(function (){
           Route::get('/view','NoticeController@viewNotice')->name('notice.view');
           Route::get('/create','NoticeController@createNotice')->name('notice.create');
           Route::post('/create','NoticeController@storeNotice');
           Route::get('/{notice}/edit','NoticeController@editNotice')->name('notice.edit');
           Route::patch('/{notice}/update','NoticeController@updateNotice')->name('notice.update');
           Route::delete('/{notice}/delete','NoticeController@deleteNotice')->name('notice.delete');
        });

        //MANAGE ALUMNI ROUTES
        Route::prefix('alumni')->group(function (){
            Route::get('/request/list','AlumniController@newRegister')->name('alumni.request.view');
            Route::get('/list','AlumniController@approvedAlumni')->name('alumni.approved.view');
            Route::get('/cv/list','AlumniController@cvList')->name('alumni.cv.list');
            Route::get('/{alumni}/cv/download','AlumniController@cvDownload')->name('alumni.cv.download');

            //Alumni Approval status update
            Route::post('/{alumni}/approve-status-update','AlumniController@approveStatusUpdate');
        });

        Route::get('/alumni/all-posts','AlumniController@alumniposts')->name('alumni.posts.list');
        Route::get('/alumni/{post}/delete','AlumniController@deletePost')->name('alumni.post.delete');

        Route::get('/{deptAdmin}/profile','DeptAdminController@profile')->name('deptadmin.profile');
        Route::post('/{deptAdmin}/updateProfile','DeptAdminController@updateProfile');

    });
});
