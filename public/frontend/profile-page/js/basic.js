$(function (){
    var email_id1 = '';
    $('#editBasicInfoBtn').on('click',function (){
        let alumniId = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: `/${alumniId}/basic-details`,
            success: (data) => {
                const {alumni_id,name,email_id,mobile_number} = data
                // $('#inputAlumniId').val(alumni_id);
                $('#inputName').val(name);
                $('#inputEmail').val(email_id);
                $('#inputMobileNumber').val(mobile_number);
                $('#basic_id').val(data.id);
                email_id1 = email_id;
            },
            error: (error) => {

            }
        })
    });

    $('#basic-form').on('submit',function (e) {
        e.preventDefault();
        const form = document.getElementById('basic-form');
        const formData = new FormData(form);
        let flag = "0";
        if (formData.get('email_id') !== email_id1){
            flag = "1";
        }
        formData.append('flag',flag);
        const id = $('#basic_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false
        });

        $.ajax({
            type: 'POST',
            url: `/${id}/basic-details/update`,
            data: formData,
            success: (data) => {
                Toastify({
                    text: "Your basic info updated successfully!!!",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
                // $('#alumniIdText').text(formData.get('alumni_id'));

                $('#mobileText').text(formData.get('mobile_number'));
                $('#nameText').text(formData.get('name'));
                $('#basic-modal').modal('hide');
                if (formData.get('email_id') !== email_id1){
                    if (data.f == 0){
                        alert('You have changed your email id. You will be logged out automatically and admin ' +
                            'approval will be needed for logging in!');
                        $('#emailText').text(formData.get('email_id'));
                        location.replace(`/login`);
                    }else{
                        alert(data.message);
                    }
                }
            },
            error: (error) => {
                console.log(error);
            }
        })
    })
});
