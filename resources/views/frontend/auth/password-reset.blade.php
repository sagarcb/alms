@extends('frontend.auth.master')

@section('main-content')
    <form class="form-horizontal" action="{{route('reset.password')}}" role="form" method="post">
        @csrf
        <h4>Reset Your password</h4>
        <div class="form-group">
            <div class="col-sm-12">
                <label for="firstName">New Password</label>
                <input type="password" name="password" id="firstName" placeholder="New Password" class="form-control ml-auto mr-auto" autofocus>
                @error('password')
                     <span style="color: red">* {{$message}}</span>
                @enderror
            </div>

            <div class="col-sm-12">
                <label for="password">Confirm Password</label>
                <input type="password" name="confirm_password" id="password" placeholder="Verification Code" class="form-control ml-auto mr-auto" autofocus>
                @error('confirm_password')
                    <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        @if(session()->has('message'))
            <span style="color: red">* {{session('message')}}</span>
        @endif
        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
    </form> <!-- /form -->
@endsection
