<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Model\AlumniAcademicInfo;
use App\Model\AlumniBasicInfo;
use App\Model\AlumniJobInfo;
use App\Model\AlumniPersonalInfo;
use App\Model\DeptInfo;
use App\Model\ProgramInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        session()->forget('data');
        return view('frontend.auth.login');
    }

    public function authentication(Request $request)
    {
       $alumniID = strtoupper($request->alumni_id);
       $alumni = AlumniBasicInfo::where('alumni_id', $alumniID)->first();
       if (!empty($alumni)){
           if (Hash::check($request->password,$alumni->password)){
               if ($alumni->approve_status == 1){
                   $alumni->active_status = 1;
                   $alumni->save();
                   session()->put('alumni_id',$alumni->id);
                   session()->put('alumni_login_status',1);
                   return redirect()->route('frontend.home');
               }else{
                   return back()->with('error','Your account is not approved yet!!!');
               }
           }else{
               return back()->with('password','Your password was incorrect!!');
           }
       }else{
           return back()->with('alumni_id1','Alumni ID is Invalid!!');
       }
    }

    public function registerFormView()
    {
        session()->forget('data');
        $deptInfo = DeptInfo::all();
        $programInfo = ProgramInfo::all();
        return view('frontend.auth.register',compact('deptInfo','programInfo'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'dept_info_id' => 'required',
            'program_info_id' => 'required',
            'alumni_id' => 'required|unique:alumni_basic_infos,alumni_id',
            'email_id' => 'required',
            'name' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required',
            'mobile_number' => 'required'
        ]);

        if ($request->confirm_password == $request->password)
        {
            $data['dept_info_id'] = $request->dept_info_id;
            $data['program_info_id'] = $request->program_info_id;
            $data['alumni_id'] = strtoupper($request->alumni_id);
            $data['email_id'] = $request->email_id;
            $data['name'] = $request->name;
            $data['password'] = Hash::make($request->password);
            $data['mobile_number'] = $request->mobile_number;
            $verifyCode = rand(100000,999999);
            $data['email_verification_code'] = $verifyCode;
            $details = [
                'name' => $request->name,
                'verification_code' => $verifyCode
            ];
            session()->put('data',$data);
            Mail::to($request->email_id)->send(new EmailVerification($details));
            return redirect()->route('email.verify');

        }else{
            return redirect()->back()->with('msg',"Confirm message didn't match with password!");
        }
    }

    public function emailVerify()
    {
        $a = session('data');
        if (!isset($a)){
            return redirect()->route('alumni.login');
        }
        return view('frontend.auth.email-verify-page');
    }

    public function storeVerifiedAlumni(Request $request)
    {
        $this->validate($request,[
            'email_verification_code' => 'required'
        ]);

        $alumni = session('data');
        $alumni['email_verification_status'] = 1;
        if ($request->email_verification_code == $alumni['email_verification_code']){
            AlumniBasicInfo::create($alumni);
            //creating a row in alumni academic info table
            $alumniAcademicInfo = new AlumniAcademicInfo();
            $alumniAcademicInfo->alumni_id = $alumni['alumni_id'];
            $alumniAcademicInfo->save();
            //creating a row in alumni personal infos table
            $alumniPersonalInfo = new AlumniPersonalInfo();
            $alumniPersonalInfo->alumni_id = $alumni['alumni_id'];
            $alumniPersonalInfo->save();
            //creating a row in alumni job infos table:
            $alumniJobInfo = new AlumniJobInfo();
            $alumniJobInfo->alumni_id = $alumni['alumni_id'];
            $alumniJobInfo->save();

            session()->forget('data');
            return redirect()->route('alumni.login')
                ->with('success','Your email is verified. Now wait for the admin approval. An email will be sent to your given email address!');
        }else{
            return back()->with('error','Verification code is invalid');
        }
    }

    public function logout(AlumniBasicInfo $alumni)
    {
        session()->forget('alumni_login_status');
        $alumni->active_status = 0;
        $alumni->save();
        return redirect()->route('alumni.login');
    }

}
