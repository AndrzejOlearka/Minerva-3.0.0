$(document).ready(function(){
    checkTrip();
});

function checkTrip()
{
    $.ajax({
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        url:"/checkTrip",
        method:"post",
        data:{
            'type' : 'trip'
        }
    })
    .done(function(data) {
        checkCallback(data);
    })
    .fail(function() {
        alert( "error" );
    })
}