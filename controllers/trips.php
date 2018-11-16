<?php 
	require '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/Advance.php';
	
	$advance = require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();

	require '../sessions/trips-sessions.php';
	$tripSession = new TripsSessions();
	require '../classes/Trip.php';

	
	if(isset($_POST['wyprawa'])){
		$trip = new Trip($_POST['wyprawa']);
		$newTrip = $trip->setNumberTimeTrip($_POST['wyprawa']);
	}
	
	require '../classes/TripEndTimeInfo.php';
	
	if(isset($_POST['wyprawa']) || isset($_POST['czas']) && !isset($_SESSION['trip_stopped'])){			
		$ajaxJsonData = new TripEndTime();
		$ajaxJsonData = $ajaxJsonData->getEndTime();
		echo json_encode($ajaxJsonData);		
		exit();
	}
	
	require '../classes/TripAbort.php';
	
	if(isset($_POST['stopTrip'])){	
		$abortTrip = new TripAbort();
		$abortTrip->stopTrip();
		unset($_SESSION['trip_stopped']);
		exit();
	}
	
	require '../classes/TripPrize.php';	
	
	$query = require '../core/bootstrap.php';

	$data = $query->select("SELECT trip_number, trip_end, trip_prize FROM trips_data WHERE user = '$userName'");
	$dateTime = new DateTime();
	$dateTime->format('Y-m-d H:i:s');
	$tripTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['trip_end']);
	$tripNumber = $data['trip_number'];	
	
	if($dateTime<$tripTime){
		$postRefreshAjax = "<br /><div><h2 id='czas' data-czas='$tripNumber'</h2></div><br />";
	}
	else{
		
		$tripInfo = "<h2 id='trip'>W tej chwili nie wykonujesz żadnych wypraw.</h2><br />";
		
		if($data['trip_prize'] == true && !isset($_SESSION['trip_stopped'])){ 
			
			$query->update("UPDATE trips_data SET trip_number = 0 WHERE user = '$userName'");
			$tripPrize = new TripPrize();
			$tripPrizeInfo = $tripPrize->getTripPrize($tripNumber);
		}
	}
	
	require '../views/trips.php';	