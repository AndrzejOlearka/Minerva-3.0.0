$(document).ready(function(){
    mineStart();
});

function mineStart()
{
    $('input[name="mine"]').click(function(){
        alert("Kopalnia została zakupiona!");
        $('.buttonStart').hide();
        var mine = $(this).data("mine");
        $.ajax({
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url:"/addMine",
            method:"post",
            data:{
                'type' : 'mine',
                'number' : mine
            }
        })
        .done(function(data) {
            if(data.prizeInfo){
                $('.popupPrize').show();
                if(data.prize == 0){
                    $('#prizeInfo').hide();
                } else {
                    $('#prizeInfo').show();
                    $('#prizeInfo').text(data.prizeInfo.info);
                }
                $('#expInfo').text(data.prizeInfo.exp);
            }
            $('.buttonStart').show();  
        })
        .fail(function() {
            alert( "error" );
        })
    });
}