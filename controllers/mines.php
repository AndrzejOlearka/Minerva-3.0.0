<?php

	require_once '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/level-update-server.php';
	
	require_once '../classes/mines-server.php';
	
	require_once '../classes/mines-daily-prize.php';


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
		
	require_once '../sessions/mines-sessions.php';
	$minesSession = new MinesSessions();

	require '../views/mines.php';	
	
?>