$(document).ready(function(){
    $(".adminNav > div").on('click', function(){
        var type = $(this).data('nav');
        $('.typeDiv').hide();
        $('#'+type).show();
    });

    var dateToday = new Date(); 
    dateToday.setDate(dateToday.getDate() + 1);
    $('.date').datepicker({  
        dateFormat: 'yy-mm-dd',
        minDate: dateToday
    });  


    $(document).on('click', '.banUser', function(){
        if($('.date').datepicker().val() != ''){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "/adminBanUser",
                method: 'post',
                data: {
                    banType: $(this).parent().parent().find('select').val(),
                    user: $(this).data('id'),
                    date: $(this).parent().parent().find('input').datepicker().val()
                }
            }).done(function(data) {
                if(data.ban){
                    $('.banUser[data-id="'+data.ban+'"]').replaceWith('<button class="unbanUser btn btn-primary" data-id="'+data.ban+'" name="userUnban">Unban User</button>')
                }
            });
        }
    });
   

    $(document).on('click', '.unbanUser', function(){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url: "/adminUnbanUser",
            method: 'post',
            data: {
                user: $(this).data('id'),
            }
        }).done(function(data) {
            if(data.unban){
                $('.unbanUser[data-id="'+data.unban+'"]').replaceWith('<button class="banUser btn btn-primary" data-id="'+data.unban+'" name="userBan">Ban User</button>')
                $('.date[data-id="'+data.unban+'"]').datepicker('setDate', null);
            }
        });
    });
});