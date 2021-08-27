<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumni Registration</title>

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('/frontend/register/register.css')}}">
</head>
<body>
<div class="container">
    <form class="form-horizontal" action="{{route('email.verify')}}" role="form" method="post">
        @csrf
        <h2>Email Verification</h2>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Verification Code</label>
            <div class="col-sm-9">
                <input type="number" name="email_verification_code" id="firstName" placeholder="Email Verification Code" class="form-control" autofocus>
                @error('email_verification_code')
                <span style="color: red">* {{$message}}</span>
                @enderror
                @if(session()->has('error'))
                    <span style="color: red">* {{session('error')}}</span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Verify Email</button>
    </form> <!-- /form -->
</div> <!-- ./container -->

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="{{asset('/frontend/register/register.js')}}"></script>
</body>
</html>
