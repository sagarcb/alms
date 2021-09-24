@extends('frontend.auth.master')

@section('main-content')
    <form class="form-horizontal" action="{{route('alumni.register')}}" role="form" method="post">
        @csrf
        <h2>Alumni Registration</h2>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Full Name</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="firstName" placeholder="Full name" class="form-control" value="{{old('name')}}" autofocus>
                @error('name')
                    <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Alumni ID</label>
            <div class="col-sm-9">
                <input type="text" name="alumni_id" id="firstName" placeholder="Alumni ID" value="{{old('alumni_id')}}" class="form-control" autofocus>
                @error('alumni_id')
                    <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email* </label>
            <div class="col-sm-9">
                <input type="email" name="email_id" id="email" placeholder="Email" value="{{old('email_id')}}" class="form-control">
                <small>* You must use a valid email address</small>
                @error('email_id')
                <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="program_code" class="col-sm-3 control-label">Program Code* </label>
            <div class="col-sm-9">
                <select name="program_info_id" id="program_code" class="form-control">
                    <option value="">Select Program</option>
                    @forelse($programInfo as $program)
                    <option value="{{$program->id}}">{{$program->program_title}}</option>
                    @empty
                    @endforelse
                </select>
                @error('program_info_id')
                <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="dept_code" class="col-sm-3 control-label">Dept Code* </label>
            <div class="col-sm-9">
                <select name="dept_info_id" id="dept_code" class="form-control">
                    <option value="">Select Department</option>
                    @forelse($deptInfo as $dept)
                    <option value="{{$dept->id}}">{{$dept->dept_code}}</option>
                    @empty

                    @endforelse
                </select>
                @error('dept_info_id')
                <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="phoneNumber" class="col-sm-3 control-label">Phone number*</label>
            <div class="col-sm-9">
                <input type="number" id="phoneNumber" name="mobile_number" placeholder="Phone number" value="{{old('mobile_number')}}" class="form-control">
                @error('mobile_number')
                <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password*</label>
            <div class="col-sm-9">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                @error('password')
                <span style="color: red">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
            <div class="col-sm-9">
                <input type="password" name="confirm_password" id="password" placeholder="Password" class="form-control">
                @error('confirm_password')
                <span style="color: red">* {{$message}}</span>
                @enderror
                @if(session()->has('msg'))
                    <span style="color: red">* {{session('msg')}}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Required fields</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form> <!-- /form -->
@endsection
