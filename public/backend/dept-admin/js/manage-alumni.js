$(function (){
    $(document).on('change','#basicSelect',function (){
        let alumniId = $(this).attr('data-id');
        const approveStatus = $(this).val();
        if (approveStatus === '1'){
            $(this).css('color','green');
        }else{
            $(this).css('color','red');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $("meta[name='csrf-token']").attr('content')
            }
        })

        $.ajax({
            type: 'POST',
            url: `/deptadmin/alumni/${alumniId}/approve-status-update`,
            data: {approve_status : approveStatus},
            success: (data) => {
                Toastify({
                    text: data,
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
                $('.closeBtn').click();
            },
            error: (error) => {
                console.log(error);
            }
        })
    })
})
