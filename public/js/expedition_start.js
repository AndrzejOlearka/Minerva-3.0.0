$(document).ready(function(){
    expeditionStart();
});

function expeditionStart()
{
    $('input[name="expedition"]').click(function(){
        alert("Zadanie zostało rozpoczęte!");
        $('.buttonStart').hide();
        var expedition = $(this).data("expedition");
        $.ajax({
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url:"/startExpedition",
            method:"post",
            data:{
                'type' : 'expedition',
                'number' : expedition
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