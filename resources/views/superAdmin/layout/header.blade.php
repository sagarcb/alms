<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link rel="shortcut icon" href="https://play-lh.googleusercontent.com/mPQOxyJTmui7TNYFBCX22ThSj8Svdjo--5f8koMp1m0thBr_NYDBBwY1XISCaqkv1y4" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/fontawesome/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/choices.js/choices.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/toastify/toastify.css')}}">
    @yield('page-styles')
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('backend/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                    <a href="{{route('admin.logout')}}" class="btn btn-sm">Logout</a>
                </div>
            </div>
