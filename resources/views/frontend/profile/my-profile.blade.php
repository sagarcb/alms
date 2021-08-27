<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Alumni Profile</title>

    <link rel="stylesheet" href="{{asset('frontend/profile-page/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/profile-page/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/fontawesome/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/toastify/toastify.css')}}">
</head>
<body>

<div class="container">
    {{--Navar starts--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 3px">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('frontend.home')}}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{--Navar ends--}}

    {{--Main contents Starts--}}
    <div class="row">
        {{--profile contents starts--}}
        <div class="col-md-4">
            <div class="card text-center" style="padding: 2px">
                <img src="{{$alumniPersonal->photo_link ? asset('/frontend/pro-image/'.$alumniPersonal->photo_link) :
                    asset('/frontend/pro-image/pro-thumbnail.png')}}" class="card-img-top profile-picture" alt="..." id="profilePicture">
                <div class="card-body">
                    <h5 class="card-title"><span id="nameText">{{$alumni->name}}</span>
                        <a href="#" data-id="{{$alumni->id}}" data-bs-toggle="modal"
                        data-bs-target="#basic-modal" id="editBasicInfoBtn"><i class="fa fa-edit"></i></a></h5>
                </div>
            </div>
            <div class="card text-center" style="padding: 2px; margin-top: 2px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="info-title">Alumni ID</p>
                        </div>
                        <div class="col-md-8">
                            <p class="info-details" id="alumniIdText">{{$alumni->alumni_id}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="info-title">Dept.</p>
                        </div>
                        <div class="col-md-8">
                            <p class="info-details" id="deptCodeText">{{isset($alumni->deptInfo->dept_code) ? $alumni->deptInfo->dept_code : ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="info-title">Program</p>
                        </div>
                        <div class="col-md-8">
                            <p class="info-details" id="programCodeText">{{isset($alumni->programInfo->program_title) ? $alumni->programInfo->program_title : ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="info-title">Email</p>
                        </div>
                        <div class="col-md-8">
                            <p class="info-details" id="emailText">{{$alumni->email_id}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="info-title">Mobile</p>
                        </div>
                        <div class="col-md-8">
                            <p class="info-details" id="mobileText">0{{$alumni->mobile_number}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--profile contents ends--}}
        <div class="col-md-8">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Academic Info</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Job Info</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">My Posts</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card" style="padding: 2px">
                        <div class="card-header d-flex justify-content-between">
                            <div>Personal Information</div>
                            <div>
                                <a class="#" data-id="{{$alumni->alumni_id}}" data-bs-toggle="modal"
                                   data-bs-target="#personal-modal" id="editPersonalInfoBtn"><i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Mailing Address</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="mailingAddressText">{{$alumniPersonal->mailing_address}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Permanent Address</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="permanentAddressText">{{$alumniPersonal->permanent_address}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">District</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="districtText">{{$alumniPersonal->district}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Upazilla</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="upazillaText">{{$alumniPersonal->upazilla}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Current Country</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="currentCountryText">{{$alumniPersonal->current_country}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Permanent Country</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="permanentCountryText">{{$alumniPersonal->permanent_country}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Father Name</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="fatherNameText">{{$alumniPersonal->father_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Mother Name</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="motherNameText">{{$alumniPersonal->mother_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Birth Date</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="birthDateText">
                                        {{$alumniPersonal->birth_date ? date('d-M-Y',strtotime($alumniPersonal->birth_date)) : ''}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Facebook URL</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="facebookUrlText">{{$alumniPersonal->facebook_link}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="card" style="padding: 2px">
                        <div class="card-header d-flex justify-content-between">
                            <div>Academic Information</div>
                            <div>
                                <a class="#" data-id="{{$alumni->alumni_id}}" data-bs-toggle="modal"
                                   data-bs-target="#academic-modal" id="editAcademicInfoBtn"><i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Passing Year</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="passingYearText">{{$alumniAcademic->passing_year}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Passing Semester</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="passingSemesterText">{{$alumniAcademic->passing_semester}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Batch</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="batchText">{{$alumniAcademic->batch}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="card" style="padding: 2px">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                Job Information
                            </div>
                            <div>
                                <a class="#" data-id="{{$alumni->alumni_id}}" data-bs-toggle="modal"
                                   data-bs-target="#job-modal" id="editJobInfoBtn"><i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Current Position</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="currentPositionText">{{$alumniJob->current_position}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Company Name</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="companyNameText">{{$alumniJob->company_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="info-title">Job Category</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="info-details" id="jobCategoryText">{{$alumniJob->job_category}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>

    </div>
    {{--Main contents ends--}}
</div>

{{--basic modal--}}
@include('frontend.profile.basic-modal')

{{--academic modal--}}
@include('frontend.profile.academic-modal')

{{--personal modal--}}
@include('frontend.profile.personal-modal')

{{--job modal--}}
@include('frontend.profile.job-modal')

<script src="{{asset('/frontend/profile-page/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/frontend/profile-page/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/backend/assets/vendors/fontawesome/all.min.js')}}"></script>
<script src="{{asset('/backend/assets/vendors/toastify/toastify.js')}}"></script>
<script src="{{asset('/frontend/profile-page/js/basic.js')}}"></script>
<script src="{{asset('/frontend/profile-page/js/personal.js')}}"></script>
<script src="{{asset('/frontend/profile-page/js/academic.js')}}"></script>
<script src="{{asset('/frontend/profile-page/js/job.js')}}"></script>
</body>
</html>
