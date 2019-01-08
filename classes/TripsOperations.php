<?php

require_once "../classes/CommonOperations.php";

abstract class TripsOperations extends CommonOperations{

	protected function getTripNumber(){
		return $tripNumber = $this->getTaskNumber('trip_number', 'trips_data');
	}
	
	protected function getDeincrementationedTripNumber(){
		$tripNumber = $this->gettripNumber();
		return $tripNumber = $tripNumber - 1;
	}
	
	protected function getTripEndTime(){
		$dateTimeFactory = require "../classes/DateTimeInfo.php";
		return $tripEndTime = DateTimeInfo::getDateTime('trips_data', 'trip_end');
	}

	protected function getMinimumPrizeArray(){
		return $minPrize = [1, 80, 2, 4, 3, 10, 40, 20, 8];
	}
	
	protected function getMaximumPrizeArray(){
		return $maxPrize = [2, 120, 3, 7, 5, 15, 60, 30, 12];
	}
	
	protected function getPremiumPrizeArray(){
		return $premMaxPrize = [3, 150, 5, 10, 9, 25, 80, 40, 16];
	}
	
	protected function getMineralsNamesArray(){
		return $mineralName = [
			'jadeites', 'crystals', 'painites', 'fluorites', 'morganites',
			'aquamarines', 'opales', 'pearls', 'cymophanes'
		];
	}
	
	protected function getPrizeInfoArray(){
		return $mineralNamePrizeInfo = [
			'jadeitów', 'kryształów górskich', 'painitów', 'fluorytów', 'morganitów',
			'akwamarynów', 'opali', 'pereł', 'cymofanów'
		];	
	}	
}

?>
