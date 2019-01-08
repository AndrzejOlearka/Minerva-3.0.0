<?php 
	require '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/Advance.php';
	require '../classes/TaskTrip.php';

	$trip = new TaskTrip();
	$trip->initiateTrip();
	$trip->getTripEndTime();
	$trip->stopTrip();
	$tripArray = $trip->showTripInfo();
	
	$advance = require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();

	require '../sessions/trips-sessions.php';
	$tripSession = new TripsSessions();
	
	require '../views/trips.php';	