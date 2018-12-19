<?php

			/* pobieranie czasu potrzebnego do wyświetlania czasu zakończenia
			 zadania w AJAX na ekspedycje.php po kliknięciu rozpoczęcia zadania lub odświeżeniu*/
			 
	class ExpeditionEndTimeInfo{

		public function getEndTime(){
			
			$endTime = require "../classes/DateTimeInfo.php";
			$stampEndTime = DateTimeInfo::getStampTime('expeditions_data', 'expedition_end');
			return $stampEndTime;
		}
	}