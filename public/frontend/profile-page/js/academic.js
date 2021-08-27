$(function (){
    $('#editAcademicInfoBtn').on('click',function (){
        const alumniId = $(this).attr('data-id');

        $.ajax({
            type: 'GET',
            url: `/${alumniId}/academic-details`,
            success: (data) => {
                const {passing_year,passing_semester,batch,id} = data;
                $('#inputPassingYear').val(passing_year);
                $('#inputBatch').val(batch);
                $('#academic_id').val(id);
                let a = $('#inputPassingSemester option');
                a.each(function (index,value){
                    if ($(value).text() == passing_semester){
                        $(value).attr('selected',true);
                    }
                });
            },
            error: (error) => {
                console.log(error)
            }
        })
    });


    $('#academic-form').on('submit',function (e){
        e.preventDefault();
        let id = $('#academic_id').val();
        let form = document.getElementById('academic-form');
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
            url: `/${id}/academic-details`,
            data: formData,
            success: (data) => {
                Toastify({
                    text: 'Academic Information Updated Successfully!',
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();

                const {passing_year, passing_semester, batch} = data;
                $('#passingYearText').text(passing_year);
                $('#passingSemesterText').text(passing_semester);
                $('#batchText').text(batch);
                $('#academic-modal').modal('hide');
            },
            error: (error) => {
                console.log(error);
            }
        })
    })

})
