	<?php

	session_start();
	
	require '../classes/ActionStatistics.php';
	$statistics = new ActionStatistics();
	$statsCreatorResult = $statistics->showStats();
	$searchUserResult = $statistics->searchUser();
			
	require '../sessions/statistics-sessions.php';
	$statisticsSession = new StatisticsSessions();
	
	require_once '../views/statistics.php';	

	?>