	<?php
	
	require_once '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/level-update-server.php';
	
	require '../classes/statistics-server.php';
	$statistics = new Stats;
			
	require '../sessions/statistics-sessions.php';
	$statisticsSession = new StatisticsSessions();

	require '../views/statistics.php';	

	?>