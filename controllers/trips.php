<?php 
	require '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/level-update-server.php';

	require '../sessions/trips-sessions.php';
	$tripSession = new TripsSessions();
	require '../classes/trips-server.php';

	
	if(isset($_POST['wyprawa'])){
		$trip = new Trip();
		$newTrip = $trip->setNumberTimeTrip();
	}
	
	if(isset($_POST['wyprawa']) || isset($_POST['czas']) && !isset($_SESSION['trip_stopped'])){			
		$ajaxJsonData = new TripEndTime();
		$ajaxJsonData = $ajaxJsonData->getEndTime();
		echo json_encode($ajaxJsonData);		
		exit();
	}
	
	if(isset($_POST['stopTrip'])){	
		$abortTrip = new AbortTrip();
		$abortTrip->stopTrip();
		exit();
	}
	
	require '../classes/trips-data.php';	
	
	$query = require '../core/bootstrap.php';

	$data = $query->select("SELECT * FROM trips_data WHERE user = '$userName'");
	$dateTime = new DateTime();
	$dateTime->format('Y-m-d H:i:s');
	$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['trip_end']);
	$tripNumber = $data['trip_number'];	
	
	if($dateTime<$endTime){
		$postRefreshAjax = "<br /><div><h2 id='czas' data-czas='$tripNumber'</h2></div><br />";
	}
	else{
		
		$tripInfo = "<h2 id='trip'>W tej chwili nie wykonujesz żadnych ekspedycji.</h2><br />";
		
		if($data['trip_prize'] == true && !isset($_SESSION['trip_stopped'])){ 
			
			$query->update("UPDATE trips_data SET trip_number = 0 WHERE user = '$userName'");
			$tripPrize = new TripPrize();
			$tripPrizeInfo = $tripPrize->getTripPrize($tripNumber);
		}
	}
	
	require_once '../views/trips.php';	