$(document).ready(function(){
    checkExpedition();
});

function checkExpedition()
{
    $.ajax({
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        url:"/checkExpedition",
        method:"post",
        data:{
            'type' : 'expedition'
        }
    })
    .done(function(data) {
        checkCallback(data);
    })
    .fail(function() {
        alert( "error" );
    })
}