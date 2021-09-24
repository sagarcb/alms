<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dept Admin</title>
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
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo text-center">
                            <img src="https://apprecs.org/gp/images/app-icons/300/0c/com.imrankst1221.example.aivus.jpg" style="width: 70px">
                        </div>
                        <h6 class="font-weight-light">Sign in to continue as Dept. Admin</h6>
                        <form class="pt-3" action="{{route('deptadmin.auth')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="dept_admin_id" class="form-control form-control-lg"
                                       id="exampleInputEmail1" value="{{old('dept_admin_id')}}" placeholder="Dept Admin Id" required>
                                <p><small style="color: red">{{session('error') ? session('error') : ''}}</small></p>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                <p><small style="color: red">{{session('error') ? session('error') : ''}}</small></p>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">

                                <a href="#" id="forget-password" class="auth-link text-black">Forgot password?</a>
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
<script src="{{asset('/backend/assets/js/extensions/sweetalert2.js')}}"></script>
<script src="{{asset('/backend/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
<!-- endinject -->

<script>
    let forgotbtn = document.getElementById('forget-password');
    forgotbtn.addEventListener('click',function (event){

        Swal.fire({
            title: 'Forgot your password?',
            icon: 'info',
            text: 'Contact with the Admin...'
        })
    })
</script>
</body>
</html>
