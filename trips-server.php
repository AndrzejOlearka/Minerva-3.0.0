<?php	
	session_start();
	
	// ustawienie nr wyprawy oraz czasu rozpoczecia i zakonczenia dla losowych zdarzen
		
	class Trip{
		
		public function setNumberTimeTrip()
		{
			$query = require 'database/bootstrap.php';

			$tripNumber = $_POST['wyprawa'];
			$query->update("UPDATE trips_data SET trip_number = '$tripNumber' WHERE user = '$userName'");
			$query->update("UPDATE trips_data SET trip_start = now() WHERE user = '$userName'");
			
			$a = [0, 1, 2, 3, 4, 5, 6, 7, 8];
			$tripPrize = $a[mt_rand(0, count($a) - 1)];
			if($tripPrize == 0 || $tripPrize == 2 || $tripPrize == 4 || $tripPrize == 6){
				$query->update("UPDATE trips_data SET trip_end = now() + INTERVAL 10 SECOND WHERE user = '$userName'");
				$_SESSION['only_exp'] = true;
			}
			else if ($tripPrize == 1 || $tripPrize == 3 || $tripPrize == 5 || $tripPrize == 7){
				$query->update("UPDATE trips_data SET trip_end = now() + INTERVAL 20 SECOND WHERE user = '$userName'");	
				$_SESSION['only_coins'] = true;
			}
			else if ($tripPrize == 8){
				$query->update("UPDATE trips_data SET trip_end = now() + INTERVAL 30 SECOND WHERE user = '$userName'");	
				$_SESSION['main_minerals'] = true;
			}
			$query->update("UPDATE trips_data SET trip_prize = true WHERE user = '$userName'");		
		}
	}

	if(isset($_POST['wyprawa'])){
		$trip = new Trip();
		$trip = $trip->setNumberTimeTrip();
	}
				
	class TripEndTime{
		
		public function getEndTime(){	
		
			$query = require 'database/bootstrap.php';
			$tripEndTime = $query->select("SELECT trip_end FROM trips_data WHERE user = '$userName'");
			$dateTime = new DateTime();
			$dateTime->format('Y-m-d H:i:s');
			$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $tripEndTime['trip_end']);
			$diffTime = $dateTime->diff($endTime);
			$endTime->format('Y/m/d H:i:s');
			$czas = "Pozostało ".$diffTime->format('%h godz, %i min, %s sek')." do zakończenia zadania"."<br />";					
			$stampEndTime = strtotime($endTime->format('Y/m/d H:i:s'));
			return $ajaxJsonData = $stampEndTime*1000;			
		}
	}


	if(isset($_POST['czas']) || isset($_POST['wyprawa']) && !isset($_SESSION['trip_stopped'])){			
		$ajaxJsonData = new TripEndTime();
		$ajaxJsonData = $ajaxJsonData->getEndTime();
		echo json_encode($ajaxJsonData);		
	}
	
	class AbortTrip{
		
		public function stopTrip(){	

			$query = require 'database/bootstrap.php';
			$tripNumber = $query->select("SELECT trip_number FROM trips_data WHERE user = '$userName'");
			$query->update("UPDATE trips_data SET trip_number = 0 WHERE user = '$userName'");
			$query->update("UPDATE trips_data SET trip_end = now() WHERE user = '$userName'");
			$tripNumber = $tripNumber['trip_number'] - 1;
			$minerals = ['z poszukiwaniem jadeitów', 'z poszukiwaniem kryształów', 'z poszukiwaniem painitów', 'z poszukiwaniem fluorytów', 'z poszukiwaniem morganitów', 'z poszukiwaniem akwamarynów', 'z poszukiwaniem opali', 'z poszukiwaniem pereł', 'z poszukiwaniem cymofanów'];
			$_SESSION['trip_stopped'] = '<div class="error col-10 col-sm-8 offset-1 offset-sm-2"><p>Przerwałeś zadanie '.$minerals[$tripNumber].', wyrusz ponownie na wyprawę, ona nic nie kosztuje!</p></div>';
			$query->update("UPDATE trips_data SET trip_prize = false WHERE user = '$userName'");
			unset($_SESSION['only_exp']);
			unset($_SESSION['only_coins']);	
			unset($_SESSION['main_minerals']);			
			header('Location: trips.php');
			exit();	
		}
	}
	
	if(isset($_POST['stopTrip'])){
		
		$abortTrip = new AbortTrip();
		$abortTrip->stopTrip();
		
	}

?>