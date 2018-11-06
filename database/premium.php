<?php

// skrypt pokazujący, czy premium jest aktywne
// script that showing if premium is activated

	$query = require 'database/bootstrap.php';
	$data = $query->select("SELECT premium_end FROM user_data WHERE user_data.user = '$userName'");
		
	$dateTime = new DateTime();
	$dateTime->format('Y-m-d H:i:s');
	$premEndTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['premium_end']);
	if($premEndTime > $dateTime){
		$premiumActivated = true;
	}
	else{
		$premiumActivated = false;
	}

?>