@component('mail::message')
Dear {{$details['name']}},

You have submitted a password reset request.
Enter the verification code given below for resetting password.
@component('mail::panel')
    <h3>{{$details['code']}}</h3>
@endcomponent

Thanks,<br>
State University Of Bangladesh
@endcomponent
