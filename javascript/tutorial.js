
$(function(){
	$('#equipment1').css({"display": "block"})
	$('#equipment').html("Ekwipunek &#9989;")
	$('#equipment').css({"color": "#336699"});
	
	$('#equipment').click(function()
	{
		$('.description').hide();
		$('#equipment1').css({"display": "block"})
		$('#tutorialContent').html("Ekwipunek");
		$('#equipment').css({"color": "#336699"});
	})
	$('#expeditions').click(function()
	{
		$('.description').hide();
		$('#expeditions1').css({"display": "block"})
		$('#tutorialContent').html("Ekspedycje");
		$('#expeditions').html("Ekspedycje &#9989;")
		$('#expeditions').css({"color": "#336699"});
	})
	$('#mains').click(function()
	{
		$('.description').hide();
		$('#mains1').css({"display": "block"})
		$('#tutorialContent').html("Kopalnie");
		$('#mains').html("Kopalnie &#9989;")
		$('#mains').css({"color": "#336699"});
	})
	$('#trips').click(function()
	{
		$('.description').hide();
		$('#trips1').css({"display": "block"})
		$('#tutorialContent').html("Wyprawy");
		$('#trips').html("Wyprawy &#9989;")		
		$('#trips').css({"color": "#336699"});
	})
	$('#missions').click(function()
	{
		$('.description').hide();
		$('#missions1').css({"display": "block"})
		$('#tutorialContent').html("Misje");
		$('#missions').html("Misje &#9989;")
		$('#missions').css({"color": "#336699"});
	})
	$('#guilds').click(function()
	{
		$('.description').hide();
		$('#guilds1').css({"display": "block"})
		$('#tutorialContent').html("Gildie");
		$('#guilds').html("Gildie &#9989;")
		$('#guilds').css({"color": "#336699"});		
	})
	$('#account').click(function()
	{
		$('.description').hide();
		$('#account1').css({"display": "block"})
		$('#tutorialContent').html("Konto");
		$('#account').html("Konto &#9989;")
		$('#account').css({"color": "#336699"});
	})
})

	$(function(){
	$('#level1').css({"display": "block"})
	$('#level').html("Level &#9989;")
	$('#level').css({"color": "#336699"});
	
	$('#level').click(function()
	{
		$('.description2').hide();
		$('#level1').css({"display": "block"})
		$('#tutorialContent2').html("Level");
		$('#level').css({"color": "#336699"});
	})
	$('#minerals').click(function()
	{
		$('.description2').hide();
		$('#minerals1').css({"display": "block"})
		$('#tutorialContent2').html("Minerały");
		$('#minerals').html("Minerały &#9989;")
		$('#minerals').css({"color": "#336699"});
	})
	$('#premium').click(function()
	{
		$('.description2').hide();
		$('#premium1').css({"display": "block"})
		$('#tutorialContent2').html("Premium");
		$('#premium').html("Premium &#9989;")
		$('#premium').css({"color": "#336699"});
	})
	$('#statistics').click(function()
	{
		$('.description2').hide();
		$('#statistics1').css({"display": "block"})
		$('#tutorialContent2').html("Statystyki");
		$('#statistics').html("Statystyki &#9989;")		
		$('#statistics').css({"color": "#336699"});
	})
})
