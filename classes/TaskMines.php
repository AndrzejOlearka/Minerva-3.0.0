<?php

require '../classes/MinesDailyPrizeInitiation.php';
require '../classes/MinesDailyPrizeInfo.php';
require '../classes/MinesShop.php';
require_once "../classes/Tasks.php";

class TaskMines{
	
	public function buyMine(){
		for($nr = 0; $nr<=11; $nr++){
			if(isset($_POST["mine$nr"])){
				$newMine = new MinesShop;
				$newMine->buyMine($nr);
			}
		}
	}
	
	public function getDailyPrize(){
		$newMine = new MinesDailyPrizeInitiation;
		if(isset($_POST['dailyPrize'])){
			for($nr = 0; $nr<=11; $nr++){
				$newMine->getDailyPrize($nr);
				if($nr==11){
					header('Location: mines.php');
					exit();
				}
			}
		}
	}
	
	public function getDailyPrizeInfo(){
		$dailyPrize = new MinesDailyPrizeInfo();
		return $formMinesDailyPrize = $dailyPrize->showDailyPrizeInfo();
	}
	
}


		
		
	

?>
