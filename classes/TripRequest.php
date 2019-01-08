<?php	
	
	require_once "../classes/TripsOperations.php";
		
	class TripRequest extends TripsOperations{
		
		protected $tripNumber;

			public function __construct($tripNumber){
				parent::__construct();
				$this->tripNumber = $tripNumber;
			}
		
		private function drawRandomNumber(){
			$randomNumbersArray = [0, 1, 2, 3, 4, 5, 6, 7, 8];
			return $tripPrize = $randomNumbersArray[mt_rand(0, count($randomNumbersArray) - 1)];
		}
		
		public function setNumberTrip(){
			$this->query->updateBindValue(
				"UPDATE trips_data 
				SET trip_number = ?, trip_start = now() 
				WHERE user = ?",
				$bindedValues = [$this->tripNumber, $this->userName]);
		}

		public function setEndTimeTrip(){		

			if($this->drawRandomNumber() % 2 == 0 && $this->drawRandomNumber() / 8 !== 1){
				$this->query->updateBindValue(
					"UPDATE trips_data 
					SET trip_end = now() + INTERVAL 10 SECOND 
					WHERE user = ?",
					$bindedValues = [$this->userName]);
				$_SESSION['only_exp'] = true;
			}
			else if ($this->drawRandomNumber() % 2 == 1){
				$this->query->updateBindValue(
					"UPDATE trips_data 
					SET trip_end = now() + INTERVAL 20 SECOND 
					WHERE user = ?",
					$bindedValues = [$this->userName]);	
				$_SESSION['only_coins'] = true;
			}
			else if ($this->drawRandomNumber() / 8 == 1){
				$this->query->updateBindValue(
					"UPDATE trips_data 
					SET trip_end = now() + INTERVAL 30 SECOND 
					WHERE user = ?",
					$bindedValues = [$this->userName]);	
				$_SESSION['main_minerals'] = true;
			}
			$this->query->updateBindValue(
				"UPDATE trips_data 
				SET trip_prize = true 
				WHERE user = ?",
				$bindedValues = [$this->userName]);	
		}
	}

?>