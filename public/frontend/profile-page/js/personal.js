$(function (){
    $('#editPersonalInfoBtn').on('click',function (e) {
        let alumniId = $(this).attr('data-id');
        $('#personal-form').trigger("reset");

        $.ajax({
            type: 'GET',
            url: `/${alumniId}/personal-details`,
            success: (data) => {
                const {id,mailing_address,district,upazilla,permanent_address,current_country,
                permanent_country,father_name,mother_name,birth_date,photo_link,facebook_link} = data;
                $('#inputMailingAddress').val(mailing_address);
                $('#inputDistrict').val(district);
                $('#inputUpazilla').val(upazilla);
                $('#inputPermanentAddress').val(permanent_address);
                $('#inputCurrentCountry').val(current_country);
                $('#inputPermanentCountry').val(permanent_country);
                $('#inputFatherName').val(father_name);
                $('#inputMotherName').val(mother_name);
                $('#inputBirthDate').val(birth_date);
                $('#inputFacebookUrl').val(facebook_link);
                $('#personal_id').val(id);
            },
            error: (error) => {
                console.log(error);
            }
        })
    });

    $('#personal-form').on('submit',function (e) {
        e.preventDefault();
        let id = $('#personal_id').val();
        let form = document.getElementById('personal-form');
        let formData = new FormData(form);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false
        });

        $.ajax({
            type: 'POST',
            url: `/${id}/personal-details`,
            data: formData,
            success: (data) => {
                Toastify({
                    text: 'Personal Information Updated Successfully!',
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();

                const {mailing_address,district,upazilla,permanent_address,current_country,
                    permanent_country,father_name,mother_name,birth_date,photo_link,facebook_link} = data;
                $('#mailingAddressText').text(mailing_address);
                $('#districtText').text(district);
                $('#upazillaText').text(upazilla);
                $('#permanentAddressText').text(permanent_address);
                $('#currentCountryText').text(current_country);
                $('#permanentCountryText').text(permanent_country);
                $('#fatherNameText').text(father_name);
                $('#motherNameText').text(mother_name);
                $('#birthDateText').text(birth_date);
                $('#facebookUrlText').text(facebook_link);
                $('#profilePicture').attr('src','/frontend/pro-image/'+photo_link);
                $('#personal-modal').modal('hide');

            },
            error: (error) => {
                console.log(error);
            }
        })
    })
})
