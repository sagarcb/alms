$(function (){
    $(document).on('change','#basicSelect',function (){
        const id = $(this).attr('data-id');
        let admin_status = $(this).val();
        $.ajax({
            type: 'GET',
            url: `/admin/${id}/statusUpdate`,
            data: {dept_admin_status: admin_status},
            success: (data) => {
                Toastify({
                    text: data,
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
            },
            error: (error) => {}
        })
    })
});

$(function () {
    $(document).on('click','#passwordResetBtn',function (){
        let name = $(this).parent().parent().parent().find('td')[1];
        const deptAdminId = $(this).attr('data-id');
        $('#newPassword').val('');
        $('#confirmNewPassword').val('');
        $('#name').text($(name).text());
        $('.deptAdminId').val(deptAdminId);
    })
})
var flag = 0;

$(function() {
   $(document).on('keyup','#confirmNewPassword',function (){
       let confirmPass = $(this).val();
       const newPass = $('#newPassword').val();
       const errorMsg = $('#errorMsg');
       if (confirmPass != newPass){
           $(errorMsg).text("* Confirm Password didn't match");
           flag = 0;
       }else if (confirmPass !== '' && newPass !== '' && confirmPass === newPass){
           flag = 1;
           $(errorMsg).text('');
       }
   })
});

$(function () {
    $(document).on('click','.submitBtn', function (e){
        e.preventDefault();
        if (flag === 1){
            let password = $('#confirmNewPassword').val();
            let deptAdmin = $('.deptAdminId').val();
            if ($('#newPassword').val().length >= 6){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

                $.ajax({
                    type: 'POST',
                    url: `/admin/${deptAdmin}/passwordReset`,
                    data: {password : password},
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
                });
            }else{
                Toastify({
                    text: 'Password must be greater than or equal to 6 characters',
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    position: 'center'
                }).showToast();
            }

        }
    })
})
