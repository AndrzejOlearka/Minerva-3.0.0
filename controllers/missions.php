<?php

	require_once '../views/partials/logged-checking.php';
	
	require '../classes/Missions.php';
	
	for($nr = 0; $nr<=8; $nr++){
		if(isset($_POST["mission$nr"])){
			$mission = new Missions();
			$mission->getMission($nr);
		}
	}
		
	require '../sessions/missions-sessions.php';
	$missionSession = new MissionsSession();
	
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	require_once '../views/missions.php';	


?>