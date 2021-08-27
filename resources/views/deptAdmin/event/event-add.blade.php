@extends('deptAdmin.layout.master')

@section('main-contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Create Event</h3>
                {{--                <p class="text-subtitle text-muted">For user to check they list</p>--}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('deptadmin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('event.view')}}">Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('event.create')}}">Add</a></li>
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
                    <a href="{{route('event.view')}}">
                        <button class="btn btn-primary"><i class="fa fa-list-alt"></i> Events List</button>
                    </a>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <form class="form form-horizontal" action="{{route('event.create')}}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Event Name</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control"
                                                   name="event_name" placeholder="Event Name" value="{{old('event_name')}}">
                                            @error('event_name')
                                            <p class="text-danger">* {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Event Date</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" class="form-control"
                                                   name="event_date" placeholder="Event Date" value="{{old('event_date')}}">
                                            @error('event_date')
                                            <p class="text-danger">* {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label>Event Details</label>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea name="event_details" id="summernote"></textarea>
                                            @error('event_details')
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
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
    </script>
@endsection
