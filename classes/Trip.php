<?php	
	
	// ustawienie nr wyprawy oraz czasu rozpoczecia i zakonczenia dla losowych zdarzen
	// setting the expedition number, trip start  and trip end time for random events
		
	class Trip{
		
		protected $tripNumber;

			public function __construct($tripNumber){
				    $this->tripNumber = $tripNumber;
			}
		
		public function setNumberTimeTrip($tripNumber)
		{
			$query = require '../core/bootstrap.php';

			$tripNumber = $this->tripNumber;
			$query->update("UPDATE trips_data SET trip_number = '$tripNumber' WHERE user = '$userName'");
			$query->update("UPDATE trips_data SET trip_start = now() WHERE user = '$userName'");
			
			$a = [0, 1, 2, 3, 4, 5, 6, 7, 8];
			$tripPrize = $a[mt_rand(0, count($a) - 1)];
			if($tripPrize === 0 || $tripPrize === 2 || $tripPrize === 4 || $tripPrize === 6){
				$query->update("UPDATE trips_data SET trip_end = now() + INTERVAL 10 SECOND WHERE user = '$userName'");
				$_SESSION['only_exp'] = true;
			}
			else if ($tripPrize === 1 || $tripPrize === 3 || $tripPrize === 5 || $tripPrize === 7){
				$query->update("UPDATE trips_data SET trip_end = now() + INTERVAL 20 SECOND WHERE user = '$userName'");	
				$_SESSION['only_coins'] = true;
			}
			else if ($tripPrize === 8){
				$query->update("UPDATE trips_data SET trip_end = now() + INTERVAL 30 SECOND WHERE user = '$userName'");	
				$_SESSION['main_minerals'] = true;
			}
			$query->update("UPDATE trips_data SET trip_prize = true WHERE user = '$userName'");		
		}
	}

?>