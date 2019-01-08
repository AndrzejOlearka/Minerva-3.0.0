<?php

	require_once '../views/partials/logged-checking.php';
	
	require '../classes/ActionGuild.php';
	$guildAction = new ActionGuild();
			
	require '../sessions/guilds-sessions.php';
	$guildsSession = new GuildSessions();
	
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	require_once '../views/guilds.php';	
