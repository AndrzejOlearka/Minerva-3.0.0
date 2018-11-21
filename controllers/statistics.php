	<?php

	require '../classes/Stats.php';
	$statistics = new Stats;
			
	require '../sessions/statistics-sessions.php';
	$statisticsSession = new StatisticsSessions();
	
	require_once '../views/statistics.php';	

	?>