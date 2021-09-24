<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\AlumniAcademicInfo;
use App\Model\AlumniBasicInfo;
use App\Model\AlumniJobInfo;
use App\Model\AlumniPersonalInfo;
use App\Model\Post;
use Illuminate\Http\Request;

class AlumniProfileController extends Controller
{
    public function index(AlumniBasicInfo $alumni)
    {
        $alumniPersonal = AlumniPersonalInfo::where('alumni_id',$alumni->alumni_id)->first();
        $alumniAcademic = AlumniAcademicInfo::where('alumni_id',$alumni->alumni_id)->first();
        $alumniJob = AlumniJobInfo::where('alumni_id',$alumni->alumni_id)->first();
        $alumniPost = Post::where('alumni_id',$alumni->alumni_id)->get();
        return view('frontend.profile.my-profile',
            compact('alumni','alumniPersonal','alumniAcademic','alumniJob','alumniPost'));
    }

    //Basic info ajax
    public function basicInfoDetails(AlumniBasicInfo $alumni)
    {
        return response()->json($alumni,200);
    }

    public function updateBasicInfo(Request $request, AlumniBasicInfo $alumni)
    {

        $alumni->name = $request->name;
        $alumni->mobile_number = $request->mobile_number;

        $message = '';
        $f = 0;

        if ($request->flag == 1){
            $uniqueEmail = AlumniBasicInfo::where('email_id',$request->email_id)->first();
            if (!$uniqueEmail){
                $alumni->approve_status = 0;
                $message = 'Your basic information successfully updated!!!';
                session()->forget('alumni_login_status');
                $alumni->active_status = 0;
                $alumni->save();
            }else{
                $message = "You can't use this email.";
                $f = 1;
            }

        }
        $alumni->save();
        return response()->json([
            'message' => $message,
            'f' => $f
        ]);
    }

    //personal info ajax
    public function personalInfoDetails($alumni_id)
    {
        $data = AlumniPersonalInfo::where('alumni_id',$alumni_id)->first();
        return response()->json($data,200);
    }

    public function personalInfoUpdate(Request $request,AlumniPersonalInfo $alumni)
    {
        $alumni->mailing_address = $request->mailing_address;
        $alumni->district = $request->district;
        $alumni->upazilla = $request->upazilla;
        $alumni->permanent_address = $request->permanent_address;
        $alumni->father_name = $request->father_name;
        $alumni->mother_name = $request->mother_name;
        $alumni->birth_date = $request->birth_date;
        $alumni->facebook_link = $request->facebook_link;
        $alumni->current_country = $request->current_country;
        $alumni->permanent_country = $request->permanent_country;

        if ($request->hasFile('photo_link')){
            if ($alumni->photo_link){
                unlink('frontend/pro-image/'.$alumni->photo_link);
            }

            $extension = $request->photo_link->getClientOriginalExtension();
            $filename = rand(10000,99999).time().'.'.$extension;
            $request->photo_link->move('frontend/pro-image/',$filename);
            $alumni->photo_link = $filename;
        }
        $alumni->save();
        return response()->json($alumni,200);
    }

    public function academicInfoDetails($alumni_id)
    {
        $data = AlumniAcademicInfo::where('alumni_id',$alumni_id)->first();
        return response()->json($data,200);
    }

    public function academicInfoUpdate(Request $request, AlumniAcademicInfo $alumni)
    {
        $alumni->passing_year = $request->passing_year;
        $alumni->batch = $request->batch;
        $alumni->passing_semester = $request->passing_semester;
        $alumni->save();
        return response()->json($alumni,200);
    }

    public function jobInfoDetails($alumni_id)
    {
        $data = AlumniJobInfo::where('alumni_id',$alumni_id)->first();
        return response()->json($data);
    }

    public function jobInfoUpdate(Request $request, AlumniJobInfo $alumni)
    {
        $alumni->current_position = $request->current_position;
        $alumni->company_name = $request->company_name;
        $alumni->job_category = $request->job_category;

        if ($request->hasFile('cv_link')){
            if ($alumni->cv_link){
                unlink('cv_list/'.$alumni->cv_link);
            }
            $extension = $request->cv_link->getClientOriginalExtension();
            $filename = rand(10000,99999).time().'.'.$extension;
            $request->cv_link->move('cv_list/',$filename);
            $alumni->cv_link = $filename;
        }
        $alumni->save();
        return response()->json($alumni,200);
    }

    //Show post details ajax
    public function postDetailsAjax(Post $post)
    {
        return response()->json($post,200);
    }

    //update post ajax
    public function updatePost(Request $request, Post $post)
    {
        $post->post = $request->post;
        $post->save();
        return response()->json($post,200);
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return response()->json('Post Successfully Deleted');
    }

    public function otherProfile(Post $post)
    {
        $alumni = AlumniBasicInfo::where('alumni_id',$post->alumni_id)->first();
        $alumniPersonal = AlumniPersonalInfo::where('alumni_id',$post->alumni_id)->first();
        $alumniAcademic = AlumniAcademicInfo::where('alumni_id',$post->alumni_id)->first();
        $alumniJob = AlumniJobInfo::where('alumni_id',$post->alumni_id)->first();
        $alumniPost = Post::where('alumni_id',$post->alumni_id)->get();
        return view('frontend.profile.others-profile',
            compact('alumni','alumniPersonal','alumniAcademic','alumniJob','alumniPost'));
    }
}
