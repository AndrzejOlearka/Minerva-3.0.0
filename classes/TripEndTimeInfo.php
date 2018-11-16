<?php	
	
	// ustawienie nr wyprawy oraz czasu rozpoczecia i zakonczenia dla losowych zdarzen
	// setting the expedition number, trip start  and trip end time for random events
		
	class TripEndTime{
		
		public function getEndTime(){	
		
			$query = require '../core/bootstrap.php';
			$tripEndTime = $query->select("SELECT trip_end FROM trips_data WHERE user = '$userName'");
			$dateTime = new DateTime();
			$dateTime->format('Y-m-d H:i:s');
			$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $tripEndTime['trip_end']);
			$diffTime = $dateTime->diff($endTime);
			$endTime->format('Y/m/d H:i:s');			
			$stampEndTime = strtotime($endTime->format('Y/m/d H:i:s'));
			return $ajaxJsonData = $stampEndTime*1000;			
		}
	}

?>