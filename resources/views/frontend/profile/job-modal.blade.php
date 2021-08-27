
<div class="modal fade bd-example-modal-lg" id="job-modal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Job Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="job-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="" id="job_id" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputCurrentPosition">Current Position</label>
                                <input type="text" name="current_position" placeholder="Current Position..." class="form-control"
                                       id="inputCurrentPosition">
                            </div>

                            <div class="form-group">
                                <label for="inputCompanyName">Company Name</label>
                                <input type="text" name="company_name" placeholder="Company Name..." class="form-control"
                                       id="inputCompanyName">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jobCategoryInput">Job Category</label>
                                <input type="text" name="job_category" class="form-control" placeholder="Job Category..." id="inputJobCategory">
                            </div>

                            <div class="form-group">
                                <label for="inputCvLink">Upload CV</label>
                                <input type="file" name="cv_link" class="form-control" id="inputCvLink">
                                <small>* Only pdf file allowed to upload</small>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary">Update Info</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
