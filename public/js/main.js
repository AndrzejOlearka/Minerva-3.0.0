$(document).ready(function(){
    hidePopup();
    hideModal();
});

function hidePopup()
{
    $('.popupPrize').on('click', function(){
        $('.popupPrize').hide();
    });
    $('.popupError').on('click', function(){
        $('.popupError').hide();
    });
}
function hideModal()
{
    $(document).on('click', '#closePopup', function(){
        $('.popup').hide();
    });
}