$(function (){
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
            },
            error: (error) => {

            }
        })
    });

    $('#basic-form').on('submit',function (e) {
        e.preventDefault();
        const form = document.getElementById('basic-form');
        const formData = new FormData(form);
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
                    text: data,
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
                // $('#alumniIdText').text(formData.get('alumni_id'));
                $('#emailText').text(formData.get('email_id'));
                $('#mobileText').text(formData.get('mobile_number'));
                $('#nameText').text(formData.get('name'));
                $('#basic-modal').modal('hide');
            },
            error: (error) => {
                console.log(error);
            }
        })
    })
});
