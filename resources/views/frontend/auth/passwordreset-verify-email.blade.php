@extends('frontend.auth.master')

@section('main-content')
    <form class="form-horizontal" action="{{route('enter.verificationCode')}}" role="form" method="post">
        @csrf
        <h5>* An email has been sent to your email. Enter the verification code down below.</h5><br>
        <h4>Enter verification Code</h4>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="number" name="verification_code" id="firstName" placeholder="Verification Code" class="form-control ml-auto mr-auto" value="{{old('verification_code')}}" autofocus>
                @if(session()->has('message'))
                    <span style="color: red">* {{session('message')}}</span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Verify</button>
    </form> <!-- /form -->
@endsection
