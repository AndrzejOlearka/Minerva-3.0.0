<?php

	abstract class ExpeditionsActions{

		public function getExpeditionNumber(){
			$query = require '../core/bootstrap.php';
			$expeditionNumber = $query->select("SELECT expedition_number FROM expeditions_data WHERE user = '$userName'");
			return $expeditionNumber['expedition_number'];
		}
		
		public function getDeincrementationedExpeditionNumber(){
			$query = require '../core/bootstrap.php';
			$expeditionNumber = $query->select("SELECT expedition_number FROM expeditions_data WHERE user = '$userName'");
			return $expeditionNumber = $expeditionNumber['expedition_number'] - 1;
		}
	
		public function getCurrentDate(){
			$dateTime = new DateTime();
			return $dateTime = $dateTime->format('Y-m-d H:i:s');
		}
	}

?>
