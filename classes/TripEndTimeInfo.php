<?php	
	
	// ustawienie nr wyprawy oraz czasu rozpoczecia i zakonczenia dla losowych zdarzen
	// setting the expedition number, trip start  and trip end time for random events
		
	class TripEndTime{
		
		public function getEndTime(){
			
			$endTime = require "../classes/DateTimeInfo.php";
			$stampEndTime = DateTimeInfo::getStampTime('trips_data', 'trip_end');
			return $stampEndTime;
		}
	}

?>