<div class="modal fade" id="basic-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Basic Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="basic-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="" id="basic_id" hidden>
{{--                    <div class="row mb-3">--}}
{{--                        <label for="inputAlumniId" class="col-sm-2 col-form-label">Alumni ID</label>--}}
{{--                        <div class="col-sm-10">--}}
{{--                            <input type="text" name="alumni_id" placeholder="Alumni ID.." class="form-control" id="inputAlumniId">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Name..." class="form-control" id="inputName" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email_id" placeholder="Email ..." class="form-control" id="inputEmail" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputMobileNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-10">
                            <input type="number" name="mobile_number" placeholder="Mobile number..." class="form-control" id="inputMobileNumber" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
