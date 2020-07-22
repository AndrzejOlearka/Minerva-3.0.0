$(document).ready(function(){
    tripStart();
});

function tripStart()
{
    $('input[name="trip"]').click(function(){
        alert("Zadanie zostało rozpoczęte!");
        $('.buttonStart').hide();
        var trip = $(this).data("trip");
        $.ajax({
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url:"/startTrip",
            method:"post",
            data:{
                'type' : 'trip',
                'number' : trip
            }
        })
        .done(function(data) {
            $('#actionDescription').text(data.actionDesc);
            actionCount(data, true);
            
        })
        .fail(function() {
            alert( "error" );
        })
    });
}