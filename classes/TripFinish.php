<?php
	// określenie nagrody za ekspedycje

	require_once "../classes/TripsOperations.php";
	
	class TripFinish extends TripsOperations{
		
		public function __construct(){
				parent::__construct();	
				$this->tripNumber = $this->getTripNumber();
			}
			
		private function getTripPrize($tripNumber){
			require '../classes/TripPrize.php';	
			$this->query->updateBindValue(
				"UPDATE trips_data 
				SET trip_number = 0 
				WHERE user = ?", 
				$bindedValues = [$this->userName]);
			$tripPrize = new TripPrize();
			return $tripPrizeInfo = $tripPrize->getTripPrize($tripNumber);
		}
		
		private function getPrizePermission(){
			$dataUserPrizePermission = $this->query->selectBindValue(
				"SELECT trip_number, trip_prize 
				FROM trips_data 
				WHERE user = ?", 
				$bindedValues = [$this->userName]);
			return $dataUserPrizePermission = $dataUserPrizePermission['trip_prize'];
		}
		
		public function showTripDetails(){			
			if($this->getCurrentDate() < $this->getTripEndTime()){
				$postRefreshAjax = "<br /><div><h2 id='czas' data-czas=".$this->tripNumber."'></h2></div><br />";
				return $tripArray = ['postRefreshAjax' => $postRefreshAjax];
			}
			else{
				$tripInfo = "<h2 id='trip'>W tej chwili nie wykonujesz żadnych wypraw.</h2><br />";
				$tripArray = ['tripInfo' => $tripInfo];
				
				if($this->getPrizePermission() == true && !isset($_SESSION['trip_stopped'])){ 
					$tripPrizeInfo = $this->getTripPrize($this->tripNumber);				
					$tripArrayNext =['tripPrizeInfo' => $tripPrizeInfo];
					return $tripArray = array_merge($tripArray, $tripArrayNext);			
				}
				else{
					return $tripArray;
				}
				
			}	
		}
	}

?>
