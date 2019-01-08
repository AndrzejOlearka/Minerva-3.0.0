<?php

			/* pobieranie czasu potrzebnego do wyświetlania czasu zakończenia
			 zadania w AJAX na ekspedycje.php po kliknięciu rozpoczęcia zadania lub odświeżeniu*/
	
	require_once "../classes/ExpeditionsOperations.php";
				 
	class ExpeditionEndTimeInfo extends ExpeditionsOperations{

		public function getEndTime(){
			
			$endTime = require "../classes/DateTimeInfo.php";
			$stampEndTime = DateTimeInfo::getStampTime('expeditions_data', 'expedition_end');
			return $stampEndTime;
		}
	}