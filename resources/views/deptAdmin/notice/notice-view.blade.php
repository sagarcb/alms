@extends('deptAdmin.layout.master')

@section('main-contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Notice List</h3>
                {{--                <p class="text-subtitle text-muted">For user to check they list</p>--}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('deptadmin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Notices</li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('notice.view')}}">List</a></li>
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
                    All the Notice List
                </div>
                <div>
                    <a href="{{route('notice.create')}}">
                        <button class="btn btn-primary" id="hello"><i class="fa fa-plus-circle"></i> Create Notice
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>Notice Name</th>
                        <th>Notice Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($notices as $row)
                        <tr>
                            <td>{{$row->notice_name}}</td>
                            <td>{{$row->notice_date}}</td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{route('notice.edit',$row->id)}}" class="btn btn-warning rounded-pill" style="margin-right: 2px"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('notice.delete',$row->id)}}" method="post"
                                          onsubmit="return confirm('Are you sure want to delete this Notice?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill"><i
                                                class="fa fa-trash-alt"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No Notice Created Yet!!</td>
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
@endsection
