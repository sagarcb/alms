
<div class="modal fade bd-example-modal-lg" id="personal-modal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Personal Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="personal-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="" id="personal_id" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputFatherName">Father Name</label>
                                <input type="text" name="father_name" placeholder="Father Name..." class="form-control"
                                       id="inputFatherName">
                            </div>

                            <div class="form-group">
                                <label for="inputMotherName">Mother Name</label>
                                <input type="text" name="mother_name" placeholder="Mother Name..." class="form-control"
                                       id="inputMotherName">
                            </div>

                            <div class="form-group">
                                <label for="inputBirthDate">Birth Date</label>
                                <input type="date" name="birth_date" class="form-control" id="inputBirthDate">
                            </div>

                            <div class="form-group">
                                <label for="inputMailingAddress">Mailing Address</label>
                                <input type="text" name="mailing_address" placeholder="Mailing Address..."
                                       class="form-control" id="inputMailingAddress">
                            </div>

                            <div class="form-group">
                                <label for="inputPermanentAddress">Permanent Address</label>
                                <input type="text" name="permanent_address" placeholder="Permanent Address..."
                                       class="form-control" id="inputPermanentAddress">
                            </div>

                            <div class="form-group">
                                <label for="inputDistrict">District</label>
                                <input type="text" name="district" placeholder="District..." class="form-control"
                                       id="inputDistrict">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="inputUpazilla">Upazilla</label>
                                <input type="text" name="upazilla" placeholder="Upazilla..." class="form-control"
                                       id="inputUpazilla">
                            </div>

                            <div class="form-group">
                                <label for="inputCurrentCountry">Current Country</label>
                                <input type="text" name="current_country" placeholder="Current Country..."
                                       class="form-control" id="inputCurrentCountry">
                            </div>

                            <div class="form-group">
                                <label for="inputPermanentCountry">Permanent Country</label>
                                <input type="text" name="permanent_country" placeholder="Permanent Country..."
                                       class="form-control" id="inputPermanentCountry">
                            </div>

                            <div class="form-group">
                                <label for="inputFacebookUrl">Facebook url</label>
                                <input type="text" name="facebook_link" placeholder="Facebook URL..."
                                       class="form-control" id="inputFacebookUrl">
                            </div>

                            <div class="form-group">
                                <label for="inputFacebookUrl">Upload Profile Picture</label>
                                <input type="file" name="photo_link" class="form-control" id="inputProfilePicture">
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
