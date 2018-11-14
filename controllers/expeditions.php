<?php

	require '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/level-update-server.php';

	require '../sessions/expeditions-sessions.php';
	$expeditionSession = new ExpeditionsSessions();
	require '../classes/expeditions-server.php';
	
	if(isset($_POST['zadanie'])){
		$expedition = new Expedition($_POST['zadanie']);
		$expeditionCheckLevelCoins = $expedition->checkRequiredCoinsLevel($_POST['zadanie']);
		$expeditionSetTime = $expedition->setExpeditionNumberTime($_POST['zadanie']);
	}
	
	if(isset($_POST['zadanie']) || isset($_POST['czas']) && !isset($_SESSION['expedition_stopped'])){
		$ajaxJsonData = new ExpeditionEndTime();
		$ajaxJsonData = $ajaxJsonData->getEndTime();
		echo json_encode($ajaxJsonData);
		exit();
	}
	
	if(isset($_POST['stopExpedition'])){
		$abortExpedition = new AbortExpedition();
		$abortExpedition->stopExpedition();
		exit();
	}
	require '../classes/expeditions-data.php';	
	
	$query = require '../core/bootstrap.php';

	$data = $query->select("SELECT expedition_number, expedition_end, expedition_prize FROM expeditions_data WHERE user = '$userName'");
	$dateTime = new DateTime();
	$dateTime->format('Y-m-d H:i:s');
	$expeditionTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['expedition_end']);
	$expeditionNumber = $data['expedition_number'];

	if($dateTime<$expeditionTime){
		$postRefreshAjax = "<br /><div><h2 id='czas' data-czas='$expeditionNumber'</h2></div><br />";
	}
	else{
		$expeditionInfo = "<h2 id='expedition'>W tej chwili nie wykonujesz żadnych ekspedycji.</h2><br>";

		if($data['expedition_prize'] == true && !isset($_SESSION['expedition_stopped'])){

			$query->update("UPDATE expeditions_data SET expedition_number = 0 WHERE user = '$userName'");
			$expeditionPrize = new ExpeditionPrize();
			$expeditionPrizeInfo = $expeditionPrize->getExpeditionPrize($expeditionNumber);
		}
	}
	require_once '../views/expeditions.php';	
	
?>