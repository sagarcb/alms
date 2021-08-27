@extends('superAdmin.layout.master')

@section('main-contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dept Admin List</h3>
                {{--                <p class="text-subtitle text-muted">For user to check they list</p>--}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('superAdmin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dept Admin</li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.list')}}">List</a></li>
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
                    Department Admin List
                </div>
                <div>
                    <a href="{{route('admin.create')}}">
                        <button class="btn btn-primary" id="hello"><i class="fa fa-plus-circle"></i> Create Dept Admin
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Dept Code</th>
                        <th>Active Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($admins as $row)
                        <tr>
                            <td>{{$row->dept_admin_id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->dept_code}}</td>
                            <td>
                                <select data-id="{{$row->id}}" class="form-select" id="basicSelect" style="width: 50%">
                                    <option value="1" {{$row->dept_admin_status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$row->dept_admin_status == 0 ? 'selected' : ''}}>Deactive</option>
                                </select>
                            </td>
                            <td>
                                <div class="btn btn-group">
                                    <form action="{{route('admin.delete',$row->id)}}" method="post"
                                          onsubmit="return confirm('Are you sure want to delete this Admin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill"><i
                                                class="fa fa-trash-alt"></i></button>
                                    </form>
                                    <button type="submit" style="margin-left: 2px" id="passwordResetBtn" class="btn btn-warning rounded-pill"
                                            data-bs-toggle="modal" data-bs-target="#password_reset_modal" data-id="{{$row->id}}"
                                    >Reset Password</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No Dept Admins Created Yet!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{--Reset password modal starts--}}

    <div class="modal fade text-left" id="password_reset_modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Reset Password for <span id="name"></span></h5>
                    <button type="button" class="close rounded-pill"
                            data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="passwordResetForm" action="">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="roundText">New Password</label>
                                    <input type="password" name="newPassword" id="newPassword" class="form-control round"
                                           placeholder="New Password">
                                    <input type="text" class="deptAdminId" value="" hidden>
                                    <small>hint: Minimum 6 characters</small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="roundText">Confirm Password</label>
                                    <input type="password" name="password" id="confirmNewPassword" class="form-control round"
                                           placeholder="Confirm Password">
                                    <small style="color: red" id="errorMsg"></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn closeBtn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1 submitBtn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--Reset password modal ends--}}

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
            $(".alert").delay(3000).slideUp(300);
        });
    </script>
    <script src="{{asset('backend/js/superAdmin.js')}}"></script>
@endsection
