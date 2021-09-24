@extends('frontend.auth.master')

@section('main-content')
    <form class="form-horizontal" action="{{route('email.enterEmail')}}" role="form" method="post">
        @csrf
        <h4>Enter your email for email verification</h4>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="email" name="email" id="firstName" placeholder="Enter you email" class="form-control ml-auto mr-auto" value="{{old('email')}}" autofocus>
                @if(session()->has('message'))
                    <span style="color: red">* {{session('message')}}</span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Send Verification Code</button>
    </form> <!-- /form -->
@endsection
