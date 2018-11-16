<?php

			/* pobieranie czasu potrzebnego do wyświetlania czasu zakończenia
			 zadania w AJAX na ekspedycje.php po kliknięciu rozpoczęcia zadania lub odświeżeniu*/

	class ExpeditionEndTimeInfo{

		public function getEndTime(){

			$query = require '../core/bootstrap.php';
			$expeditionEndTime = $query->select("SELECT expedition_end FROM expeditions_data WHERE user = '$userName'");
			$dateTime = new DateTime();
			$dateTime->format('Y-m-d H:i:s');
			$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $expeditionEndTime['expedition_end']);
			$diffTime = $dateTime->diff($endTime);
			$endTime->format('Y/m/d H:i:s');
			$stampEndTime = strtotime($endTime->format('Y/m/d H:i:s'));
			return $ajaxJsonData = $stampEndTime*1000;
		}
	}