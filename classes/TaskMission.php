<?php

require_once "../classes/Tasks.php";
require '../classes/MissionInitiation.php';

class TaskMission extends Missions{
		
	public function executeMission(){
		for($nr = 0; $nr<=8; $nr++){
			if(isset($_POST["mission$nr"])){
				$mission = new MissionInitiation();
				$mission->getMission($nr);
			}
		}
	}
}


		
		
	

?>
