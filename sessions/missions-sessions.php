<?php

class MissionsSession{
	
	public function misSessionLowAmountFirst(){
		if(isset($_SESSION['e_mission_amount_first'])) 
		{echo $_SESSION['e_mission_amount_first'];}
		unset($_SESSION['e_mission_amount_first']);
	}
	
	public function misSessionLowAmountSecond(){
		if(isset($_SESSION['e_mission_amount_second'])) 
		{echo $_SESSION['e_mission_amount_second'];}
		unset($_SESSION['e_mission_amount_second']);
	}   
	
	public function misSessionCompleted(){
		if(isset($_SESSION['mission_completed'])) 
		{echo $_SESSION['mission_completed'];}
		unset($_SESSION['mission_completed']);
	}   
		

	

	
}

?>