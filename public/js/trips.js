$(document).ready(function(){
    $('.mapTrips').on('click', function(){
        var tripNumber = $(this).data('trip');
        $(".mapTrips").css('filter', 'brightness(80%)');	
		$('.mapTrips[data-trip="'+tripNumber+'"]').css('filter', 'brightness(100%)');	
		$('.tripDescription').hide();
		$('#tripDescription'+tripNumber).show();
    });
});