<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\AlumniAcademicInfo;
use App\Model\AlumniBasicInfo;
use App\Model\AlumniJobInfo;
use App\Model\AlumniPersonalInfo;
use Illuminate\Http\Request;

class AlumniProfileController extends Controller
{
    public function index(AlumniBasicInfo $alumni)
    {
        $alumniPersonal = AlumniPersonalInfo::where('alumni_id',$alumni->alumni_id)->first();
        $alumniAcademic = AlumniAcademicInfo::where('alumni_id',$alumni->alumni_id)->first();
        $alumniJob = AlumniJobInfo::where('alumni_id',$alumni->alumni_id)->first();
        return view('frontend.profile.my-profile',
            compact('alumni','alumniPersonal','alumniAcademic','alumniJob'));
    }

    //Basic info ajax
    public function basicInfoDetails(AlumniBasicInfo $alumni)
    {
        return response()->json($alumni,200);
    }

    public function updateBasicInfo(Request $request, AlumniBasicInfo $alumni)
    {
//        if ($alumni->alumni_id != $request->alumni_id){
//            //updating value in job info table
//            $alumniJob = AlumniJobInfo::where('alumni_id',$alumni->alumni_id)->first();
//            $alumniJob->alumni_id = $request->alumni_id;
//            $alumniJob->save();
//
//            //updating value in personal info table
//            $alumniPersonal = AlumniPersonalInfo::where('alumni_id',$alumni->alumni_id)->first();
//            $alumniPersonal->alumni_id = $request->alumni_id;
//            $alumniPersonal->save();
//
//            //updating value in academic info table
//            $alumniAcademic = AlumniAcademicInfo::where('alumni_id',$alumni->alumni_id)->first();
//            $alumniAcademic->alumni_id = $request->alumni_id;
//            $alumniAcademic->save();
//        }
        $alumni->name = $request->name;
        $alumni->email_id = $request->email_id;
        $alumni->mobile_number = $request->mobile_number;
        $alumni->save();
        return response()->json('Alumni Basic Information Successfully Updated!!!');
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
}
