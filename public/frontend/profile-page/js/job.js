$(function (){
    $('#editJobInfoBtn').on('click',function (){
        const alumniId = $(this).attr('data-id');

        $.ajax({
            type: 'GET',
            url: `/${alumniId}/job-details`,
            success: (data) => {
                const {current_position,company_name,job_category,id} = data;
                $('#inputCurrentPosition').val(current_position);
                $('#inputCompanyName').val(company_name);
                $('#inputJobCategory').val(job_category);
                $('#job_id').val(id);
            },
            error: (error) => {
                console.log(error);
            }
        })
    });

    $('#job-form').on('submit',function (e){
        e.preventDefault();
        const id = $('#job_id').val();
        const form = document.getElementById('job-form');
        const formData = new FormData(form);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false
        });

        $.ajax({
            type: 'POST',
            url: `/${id}/job-details`,
            data: formData,
            success: (data) => {
                const {current_position,company_name,job_category} = data;
                $('#currentPositionText').text(current_position);
                $('#companyNameText').text(company_name);
                $('#jobCategoryText').text(job_category);
                $('#job-modal').modal('hide');

                Toastify({
                    text: 'Job Information Updated Successfully!',
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
            }
        })
    })

})
