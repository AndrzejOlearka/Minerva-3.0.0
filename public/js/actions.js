function checkCallback(data)
{
    var date = new Date().getTime();
    if(data.date_end > date){
        actionCount(data, true);
        $('.buttonStart').hide();
    } else {
        if(data.prizeInfo){
            $('.popupPrize').show();
            if(data.prize == 0){
                $('#prizeInfo').hide();
            } else {
                $('#prizeInfo').show();
                $('#prizeInfo').text(data.prizeInfo.info);
            }
            $('#expInfo').text(data.prizeInfo.exp);
            $('.buttonStart').show();
        } else {
            $('.buttonStart').show();
            actionCount(data, false);
        }
    }
    setTimeout(function() {
        $('#actionContent').show(); 
    }, 1000);
}

function actionCount(data, abs){

    var clock = sessionStorage.getItem('clock');
    clearInterval(clock);
    sessionStorage.removeItem('clock');

    var clock = setInterval(function() {
        var date1 = new Date().getTime();
        var date2 = data.date_end;
        if(!abs){
            var diff = date2 - date1;	
            diff = Math.abs(diff);
            $('#actionDescription').text("Od ostatniej ekspedycji minęło:");
        } else {
            var diff = date2 - date1;	
        }			
        
        var time = $('#time');		
        if(diff<1)
        {
            $('.button').show();
            setTimeout(function() {
                var check = data.actionType.charAt(0).toUpperCase() + data.actionType.slice(1)
                var checkAction = 'check'+check;
                console.log(checkAction);
                window[checkAction]();
            }, 1000);
        }
        else
        {
            if(diff<60000)
            {	
                var seconds = Math.round(diff/1000);
                var endTime = '0:'+seconds;
                if(seconds < 10){
                    endTime = '0:0'+seconds;
                }			   
            }
            else if(diff>3600000)
            {
                var hours = Math.floor(diff / 3600000);
                if(hours < 10){
                    hours = '0'+hours;
                    }
                var minutes = Math.floor(diff / 60000 % 60);
                if(minutes < 10){
                    minutes = '0'+minutes;
                }
                var seconds = ((diff % 60000) / 1000).toFixed(0);
                if(seconds < 10){
                    seconds = '0'+seconds;
                }	
                var endTime = hours+':'+minutes+':'+seconds;														
            }	
            else if(diff>60000)
            {
                var minutes = Math.floor(diff / 60000);
                var seconds = ((diff % 60000) / 1000).toFixed(0);
                if(seconds < 10){
                    seconds = '0'+seconds;
                }	
                var endTime = minutes+':'+seconds;															
            }	
            time.text(endTime);
        }									
    }, 1000);
    sessionStorage.setItem('clock', clock);
}
