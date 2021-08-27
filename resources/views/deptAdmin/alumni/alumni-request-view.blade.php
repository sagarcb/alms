@extends('deptAdmin.layout.master')

@section('main-contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Alumni New Registration List</h3>
                {{--                <p class="text-subtitle text-muted">For user to check they list</p>--}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('deptadmin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Alumni</li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('alumni.request.view')}}">List</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @endif
                @if(session()->has('delete'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{session('delete')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    All Alumni Account Approval List
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Alumni ID</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Approve Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($alumnis as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->alumni_id}}</td>
                            <td>{{$row->email_id}}</td>
                            <td>{{$row->mobile_number}}</td>
                            <td>
                                <select data-id="{{$row->id}}" class="form-select" id="basicSelect" style="color: {{$row->approve_status == 1 ? 'green' : 'red'}}">
                                    <option value="1" {{$row->approve_status == 1 ? 'selected' : ''}}>Approve</option>
                                    <option value="0" {{$row->approve_status == 0 ? 'selected' : ''}}>DisApprove</option>
                                </select>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">No Alumni Account Request!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('page-styles')

@endsection

@section('page-scripts')
    <!-- Include Choices JavaScript -->
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        $(document).ready(function () {
            $(".alert").delay(4000).slideUp(300);
        });
    </script>
    <script src="{{asset('backend/dept-admin/js/manage-alumni.js')}}"></script>
@endsection
