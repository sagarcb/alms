$(function (){
    $('#postForm').on('submit',function (e){
        if ($('#postText').val() === ''){
            e.preventDefault();
        }
    });
})
