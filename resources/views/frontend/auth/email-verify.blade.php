<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
</head>
<body>
<div class="container">
    <p>Hi, {{$details['name']}}</p>
    <br/>
    <h3>Your email verification code is:</h3>
    <h3>{{$details['verification_code']}}</h3>
    <br/>
    <p>SUB Alumni Web Portal</p>
    <p>Thank You</p>
</div> <!-- ./container -->

</body>
</html>
