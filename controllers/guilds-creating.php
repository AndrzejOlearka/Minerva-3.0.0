<?php

	require_once '../views/partials/logged-checking.php';
	
	require '../classes/Guild.php';

	if(isset($_POST['guildName'])){
		$guilds = new Guild;
		$guildss = $guilds->createGuild();
	}
			
	require '../sessions/guilds-sessions.php';
	$guildsSession = new GuildSessions();

	require_once '../views/guilds-creating.php';	
