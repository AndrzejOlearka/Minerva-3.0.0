<?php

	require_once '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/level-update-server.php';
	
	require '../classes/guilds-server.php';
	$guilds = new Guild;
			
	require '../sessions/guilds-sessions.php';
	$guildsSession = new GuildSessions();

	require '../views/guilds.php';	
