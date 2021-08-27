@extends('superAdmin.layout.master')

@section('main-contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Create Department Admin</h3>
                {{--                <p class="text-subtitle text-muted">For user to check they list</p>--}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/superAdmin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('admin.list')}}">Dept Admins</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.create')}}">Create</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    Give the necessary Information
                </div>
                <div>
                    <a href="{{route('admin.list')}}">
                        <button class="btn btn-primary"><i class="fa fa-list-alt"></i>Dept Admin List</button>
                    </a>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form class="form form-horizontal" action="{{route('admin.create')}}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Name" id="first-name-icon" value="{{old('name')}}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                @error('name')
                                                <p class="text-danger">* {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Admin ID</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                           placeholder="Admin ID" name="dept_admin_id" id="first-name-icon" value="{{old('dept_admin_id')}}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-key"></i>
                                                    </div>
                                                </div>
                                                <p><small>* Dept Admin ID must be unique</small></p>
                                                @error('dept_admin_id')
                                                    <p class="text-danger">* {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Dept Code</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <select name="dept_code" class="form-select" id="basicSelect">
                                                        <option value="">Select Dept Code</option>
                                                        @forelse($deptCode as $row)
                                                            <option value="{{$row->dept_code}}">{{$row->dept_code}}</option>
                                                        @empty
                                                            <option value="">No Departments</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                @error('dept_code')
                                                    <p class="text-danger">* {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" name="password" class="form-control"
                                                           placeholder="Password" value="{{old('password')}}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><small>* Minimum 6 Characters</small></p>
                                            @error('password')
                                            <p class="text-danger">* {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('page-scripts')

@endsection
