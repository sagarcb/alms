<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dept Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/summernote/summernote-lite.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/app.css')}}">
    <link rel="shortcut icon" href="https://play-lh.googleusercontent.com/mPQOxyJTmui7TNYFBCX22ThSj8Svdjo--5f8koMp1m0thBr_NYDBBwY1XISCaqkv1y4" />
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/fontawesome/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/choices.js/choices.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/toastify/toastify.css')}}">
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo d-flex justify-content-between">
                        <a href="{{route('deptadmin.profile',session('dept_admin_id'))}}">{{substr($deptadmin->name,0,9)}}..</a>
                        <a href="{{route('deptadmin.logout')}}" style="margin-left: 20px"><small><i class="fa fa-sign-out-alt"></i></small></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
