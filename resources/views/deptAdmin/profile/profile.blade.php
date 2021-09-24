@extends('deptAdmin.layout.master')

@section('main-contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>My Profile</h3>
                {{--                <p class="text-subtitle text-muted">For user to check they list</p>--}}
            </div>

        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">

            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <form class="form form-horizontal" action="" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name: </label>
                                        </div>
                                        <div class="col-md-8 form-group d-flex justify-content-between">
                                            <input type="text" class="form-control"
                                                   name="name" placeholder="Name" value="{{$deptAdmin->name}}" id="name" readonly required>
                                            <button class="btn btn-sm btn-warning ml-1" id="editBtn"><i class="fa fa-edit"></i></button>
                                        </div>
                                        <div class="col-md-4">
                                            <label>ID</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control"
                                                   name="notice_date" value="{{$deptAdmin->dept_admin_id}}" disabled>
                                        </div>

                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-8 form-group">
                                            <button data-id="{{$deptAdmin->id}}" class="btn btn-sm btn-primary" id="updateBtn" hidden>Update Name</button>
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

@section('page-styles')
    <link rel="stylesheet" href="{{asset('/backend/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
@endsection

@section('page-scripts')
    <script src="{{asset('/backend/assets/js/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('/backend/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
    </script>
    <script>
        $('#editBtn').on('click',function (e){
            e.preventDefault();
            const nameInput = $('#name');
            $(nameInput).removeAttr('readonly');
            $('#updateBtn').removeAttr('hidden');
        })

        $('#updateBtn').on('click',function (e){

            e.preventDefault();
            const name = $('#name').val();
            const id = $(this).attr('data-id');
            if (name){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: `/deptadmin/${id}/updateProfile`,
                    data: {name : name},
                    success: (data) => {
                        $('#name').val(data.name);
                        $('#name').attr('readonly','true');
                        $('#updateBtn').attr('hidden','true');
                        Swal.fire('Profile Updated Successfully')
                    },
                    error: (error) => {

                    }
                })
            }else{
                Swal.fire('Name Field Cannot be empty')
            }
        })
    </script>
@endsection
