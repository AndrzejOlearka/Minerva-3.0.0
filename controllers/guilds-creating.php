<?php

	require_once '../views/partials/logged-checking.php';
	
	require '../classes/Guild.php';
	require '../classes/ActionGuild.php';

	$guild = new ActionGuild;
	$guild->createGuild();
	
			
	require '../sessions/guilds-sessions.php';
	$guildsSession = new GuildSessions();

	require_once '../views/guilds-creating.php';	
