$(function() {
	var $click = new Audio();
	$click.src="../public/audio/click_audio.mp3";
	var $div = $('div').not('nav div').not('.container-fluid');
	$div.each(function(){
		$(this).on('mouseenter', function(){
			$click.play();
		});
	});
});	
	