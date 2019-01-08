<?php

	require_once '../views/partials/logged-checking.php';
	
	require_once "../classes/TaskMines.php";
	$mines = new TaskMines();
	$mines->buyMine();
	$mines->getDailyPrize();
	$formMinesDailyPrize = $mines->getDailyPrizeInfo();

		
	require '../sessions/mines-sessions.php';
	$minesSession = new MinesSessions();
	
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	require_once '../views/mines.php';	
	
?>