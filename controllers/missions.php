<?php

	require_once '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/level-update-server.php';
	
	require_once '../classes/missions-server.php';
	
	for($nr = 0; $nr<=8; $nr++){
		if(isset($_POST["mission$nr"])){
			$mission = new Missions($nr);
		}
	}
		
	require_once '../sessions/missions-sessions.php';
	$missionSession = new MissionsSession();

	require '../views/missions.php';	


?>