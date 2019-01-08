<?php	
	
	require_once "../classes/TripsOperations.php";
		
	class TripAbort extends TripsOperations{
		
		public function stopTrip(){	
			$tripNumber = $this->getDeincrementationedTripNumber();
			$mineralsName = $this->getPrizeInfoArray();
			$query = require '../core/bootstrap.php';
			$query->updateBindValue(
				"UPDATE trips_data 
				SET trip_number = 0, trip_end = now(), trip_prize = false 
				WHERE user = ?", 
				$bindedValues = [$userName]);
			$_SESSION['trip_stopped'] = 
				'<div class="error col-10 col-sm-8 offset-1 offset-sm-2">
					Przerwałeś zadanie z poszukiwaniem '.$mineralsName[$tripNumber].', wyrusz ponownie na wyprawę, ona nic nie kosztuje!
				</div>';
			unset($_SESSION['only_exp']);
			unset($_SESSION['only_coins']);	
			unset($_SESSION['main_minerals']);			
			header('Location: ../controllers/trips.php');
			exit();	
		}
	}
	

?>