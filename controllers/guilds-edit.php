<?php

	require_once '../views/partials/logged-checking.php';
	
	require '../classes/ActionGuild.php';
	$guilds = new ActionGuild;
	$guilds->editGuildLeaderMode();
	$guilds->editGuildMemberMode();
	
	require '../core/FormSending.php';
	FormSending::preventSendingData();

	require '../sessions/guilds-sessions.php';
	$guildsSession = new GuildSessions();

	require_once '../views/guilds-edit.php';	