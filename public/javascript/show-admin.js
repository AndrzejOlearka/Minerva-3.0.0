	$(function(){
	
	$('#admin1').click(function()
	{
		$('#adminSearch').hide();
		$('#adminModerators').hide();
		$('#adminPlayers').show();
	});
	$('#admin2').click(function()
	{
		$('#adminPlayers').hide();
		$('#adminModerators').hide();
		$('#adminSearch').show();
	});
	$('#admin3').click(function()
	{
		$('#adminSearch').hide();
		$('#adminPlayers').hide();
		$('#adminModerators').show();
	});

	});