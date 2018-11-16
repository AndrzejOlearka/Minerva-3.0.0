	<?php
	
	require_once '../views/partials/logged-checking.php';

	require '../classes/Stats.php';
	$statistics = new Stats;
			
	require '../sessions/statistics-sessions.php';
	$statisticsSession = new StatisticsSessions();
	
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	require_once '../views/statistics.php';	

	?>