
<div class="modal fade bd-example-modal-lg" id="academic-modal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Academic Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="academic-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="" id="academic_id" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassingYear">Passing Year</label>
                                <input type="number" name="passing_year" placeholder="Passing Year..." class="form-control"
                                       id="inputPassingYear">
                            </div>

                            <div class="form-group">
                                <label for="inputUpazilla">Batch</label>
                                <input type="number" name="batch" placeholder="Batch..." class="form-control"
                                       id="inputBatch">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassingSemester">Passing Semester</label>
                                <select class="form-select" name="passing_semester" id="inputPassingSemester">
                                    <option value="SUMMER">SUMMER</option>
                                    <option value="SPRING">SPRING</option>
                                    <option value="FALL">FALL</option>
                                </select>
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
