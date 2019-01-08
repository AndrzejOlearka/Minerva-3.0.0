<?php

	require_once '../views/partials/logged-checking.php';
	
	require '../classes/TaskMission.php';
	
	$mission = new TaskMission();
	$mission->executeMission();
		
	require '../sessions/missions-sessions.php';
	$missionSession = new MissionsSession();
	
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	require_once '../views/missions.php';	


?>