$(function(){
    $(document).on('click','.post_edit_btn',function (){
        let id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
           type: 'GET',
           url: `../../../${id}/post-details-ajax`,
           success: (data) => {
               $('#inputPost').val(data.post);
               $('#post_id').val(data.id);
           }
        });
    });

    $(document).on('submit','#post-form',function (e){
        e.preventDefault();
        let postData = document.getElementById('post-form');
        let formData = new FormData(postData);
        let id = formData.get('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false
        });

        $.ajax({
            type: 'POST',
            url: `/${id}/post-update`,
            data: formData,
            success: (data) => {
                let post = $(`p[data-id=${data.id}]`);
                let text = '';
                if (data.post.length > 120){
                    for (let i = 0; i < 120; i++){
                        text += data.post[i];
                    }
                }else{
                    text = data.post;
                }
                $(post).text(text+" ............");
                $('#post-modal').modal('hide');
            }
        })
    })

    $(document).on('click','.post_delete_btn',function (){
        if (confirm('Are you sure want to delete this Post?')){
            let id = $(this).attr("data-id");
            let post = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false
            });

            $.ajax({
                type: 'DELETE',
                url: `/${id}/delete-post`,
                success: (data) => {
                    $(post).parent().parent().remove();
                    Toastify({
                        text: data,
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();
                }
            })
        }
    });
});
