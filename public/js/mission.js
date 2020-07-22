$(document).ready(function(){
    missionStart();
});

function missionStart()
{
    $('input[name="mission"]').click(function(){
        alert("Misja została wykonana!");
        var mission = $(this).data("mission");
        $.ajax({
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url:"/completeMission",
            method:"post",
            data:{
                'type' : 'mission',
                'number' : mission
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
                    $('#prizeInfoExp').text(data.prizeInfo.exp);
                }
                $('#expInfo').text(data.prizeInfo.exp);
            } else if(data.costErrors){
                $('.popupError').show();
                let list = '';
                $(data.costErrors.list).each(function(){
                    console.log(this);
                    list = list + '<p>'+this+'</p>';
                });
                $('#costErrors').html(list);
            }
        })
        .fail(function() {
            alert( "error" );
        })
    });
}