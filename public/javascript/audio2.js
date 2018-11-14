
$(function() {
	var $click2 = new Audio();
	$click2.src="../public/audio/click_audio2.mp3";
	var $div = $('nav > div');
	$div.each(function(){
		$(this).on('mouseenter', function(){
			$click2.play();
		});
	});
});	
	
