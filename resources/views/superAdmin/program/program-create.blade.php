@extends('superAdmin.layout.master')

@section('main-contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add Department</h3>
                {{--                <p class="text-subtitle text-muted">For user to check they list</p>--}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/superAdmin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('program.list')}}">Programs</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('program.create')}}">Create</a></li>
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
                    <a href="{{route('program.list')}}">
                        <button class="btn btn-primary"><i class="fa fa-list-alt"></i> Programs List</button>
                    </a>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form class="form form-horizontal" action="{{route('program.create')}}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Department Code</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <select name="dept_info_id" class="form-select" id="basicSelect">
                                                        <option value="">Select Dept Code</option>
                                                        @forelse($dept as $row)
                                                            <option value="{{$row->id}}">{{$row->dept_code}}</option>
                                                        @empty
                                                            <option value="">No Departments</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                @error('dept_info_id')
                                                <p class="text-danger">* {{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Program ID</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control"
                                                   name="program_id" placeholder="Program ID" value="{{old('program_id')}}">
                                            @error('program_id')
                                            <p class="text-danger">* {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Program Title</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control"
                                                   name="program_title" placeholder="Program Title" value="{{old('program_title')}}">
                                            @error('program_title')
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
