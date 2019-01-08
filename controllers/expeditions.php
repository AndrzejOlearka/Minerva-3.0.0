<?php

	require '../views/partials/logged-checking.php';

	require '../classes/TaskExpedition.php';

	$expedition = new TaskExpedition();
	$expedition->initiateExpedition();
	$expedition->getExpeditionEndTime();
	$expedition->stopExpedition();
	$expeditionArray = $expedition->showExpeditionInfo();
	
	require '../sessions/expeditions-sessions.php';
	$expeditionSession = new ExpeditionsSessions();
	
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	include '../classes/DataUser.php';
	include '../classes/ExpeditionRequiredCoins.php';
	
	require '../views/expeditions.php';	
	
?>