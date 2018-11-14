<?php

class TripsSessions{
	
	public function tripsErrorStoppedTrip(){
	if(isset($_SESSION['trip_stopped']))
		{echo $_SESSION['trip_stopped'];}
		unset($_SESSION['trip_stopped']);
	}
}

?>