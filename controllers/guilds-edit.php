﻿<?php

	require_once '../views/partials/logged-checking.php';
	
	require '../classes/Guild.php';

	if(isset($_POST['guildDescription']) || isset($_POST['guildLeader'])){
		$guilds = new Guild;
		$guilds3 = $guilds->editGuild();
	}
	
	require '../sessions/guilds-sessions.php';
	$guildsSession = new GuildSessions();

	require_once '../views/guilds-edit.php';	