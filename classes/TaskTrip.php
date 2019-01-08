<?php

require_once "../classes/Tasks.php";
require '../classes/TripRequest.php';
require '../classes/TripEndTimeInfo.php';
require '../classes/TripAbort.php';
require '../classes/TripFinish.php';	
	
	class TaskTrip extends Trips{

		public function initiateTrip(){
			if(isset($_POST['wyprawa'])){
				$trip = new TripRequest($_POST['wyprawa']);
				$trip->setNumberTrip();
				$trip->setEndTimeTrip();
			}
		}

		public function getTripEndTime(){
			if(isset($_POST['wyprawa']) || isset($_POST['czas']) && !isset($_SESSION['trip_stopped'])){			
				$ajaxJsonData = new TripEndTime();
				$ajaxJsonData = $ajaxJsonData->getEndTime();
				echo json_encode($ajaxJsonData);		
				exit();
			}
		}

		public function stopTrip(){	
			if(isset($_POST['stopTrip'])){	
				$abortTrip = new TripAbort();
				$abortTrip->stopTrip();
				unset($_SESSION['trip_stopped']);
				exit();
			}
		}
		
		public function showTripInfo(){	
			$tripFinish = new TripFinish();
			return $tripArray = $tripFinish->showTripDetails();
		}
	}
		



		
		
	

?>
