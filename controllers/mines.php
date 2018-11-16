<?php

	require_once '../views/partials/logged-checking.php';

	require '../classes/Mines.php';
		
		for($nr = 0; $nr<=11; $nr++){
		if(isset($_POST["mine$nr"])){
			$newMine = new Mines;
			$newMine->buyMine($nr);
		}
	}

	$newMine = new Mines;
	if(isset($_POST['dailyPrize'])){
		for($nr = 0; $nr<=11; $nr++){
			$newMine->getDailyPrize($nr);
			if($nr==11){
				header('Location: mines.php');
				exit();
			}
		}
	}
	
	require '../classes/MinesDailyPrizeInfo.php';

	$dailyPrize = new MinesDailyPrizeInfo();
	$formMinesDailyPrize = $dailyPrize->getInfo();

		
	require '../sessions/mines-sessions.php';
	$minesSession = new MinesSessions();
	
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	require_once '../views/mines.php';	
	
?>