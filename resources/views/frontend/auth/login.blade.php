<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alumni Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('/frontend/login/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/login/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('/frontend/login/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://play-lh.googleusercontent.com/mPQOxyJTmui7TNYFBCX22ThSj8Svdjo--5f8koMp1m0thBr_NYDBBwY1XISCaqkv1y4" />
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-12 mx-auto">
                    @if(session()->has('success'))
                        <div class="alert alert-primary text-center" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session()->has('error'))
                            <div class="alert alert-primary text-center" role="alert">
                                {{session('error')}}
                            </div>
                    @endif
                </div>
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo text-center">
                            <img src="https://apprecs.org/gp/images/app-icons/300/0c/com.imrankst1221.example.aivus.jpg" style="width: 70px">
                        </div>

                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form class="pt-3" action="{{route('alumni.login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="alumni_id" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Alumni ID" value="{{old('alumni_id')}}" required>
                                @if(session()->has('alumni_id1'))
                                    <small style="color: red">*{{session('alumni_id1')}}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                @if(session()->has('password'))
                                <small style="color: red">*{{session('password')}}</small>
                                @endif
                            </div>
                            <div class="mt-3">
{{--                                <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>--}}
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                </div>
                                <a href="{{route('email.enterEmail')}}" class="auth-link text-black">Forgot password?</a>
                            </div>
                            <div class="my-2">
                                <a href="{{route('alumni.register')}}" class="auth-link text-black">Register as a new Alumni</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('/frontend/login/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('/frontend/login/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('/frontend/login/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('/frontend/login/assets/js/misc.js')}}"></script>
<!-- endinject -->
</body>
</html>
