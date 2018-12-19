<?php
	// określenie nagrody za ekspedycje

	require_once "../classes/ExpeditionsActions.php";
	
	class ExpeditionFinish extends ExpeditionsActions{
		
		private function getExpeditionPrize($expeditionNumber){
			$query = require '../core/bootstrap.php';
			$query->update("UPDATE expeditions_data SET expedition_number = 0 WHERE user = '$userName'");
			require '../classes/ExpeditionPrize.php';	
			$expeditionPrize = new ExpeditionPrize();
			return $expeditionPrizeInfo = $expeditionPrize->getExpeditionPrize($expeditionNumber);		
		}
		
		public function showExpeditionDetails(){
			$dateTime = $this->getCurrentDate();		
			$endTime = require "../classes/DateTimeInfo.php";
			$expeditionTime = DateTimeInfo::getDateTime('expeditions_data', 'expedition_end');
			
			$query = require '../core/bootstrap.php';
			$data = $query->select("SELECT expedition_number, expedition_prize FROM expeditions_data WHERE user = '$userName'");
			$expeditionNumber = $this->getExpeditionNumber();
			
			if($dateTime<$expeditionTime){
				$postRefreshAjax = "<br /><div><h2 id='czas' data-czas='$expeditionNumber'></h2></div><br />";
				return $expeditionArray = ['postRefreshAjax' => $postRefreshAjax];
			}
			else{
				$expeditionInfo = "<h2 id='expedition'>W tej chwili nie wykonujesz żadnych ekspedycji.</h2><br>";
				$expeditionArray = ['expeditionInfo' => $expeditionInfo];
				
				if($data['expedition_prize'] == true && !isset($_SESSION['expedition_stopped'])){
					$expeditionPrizeInfo = $this->getExpeditionPrize($expeditionNumber);				
					$expeditionArrayNext =['expeditionPrizeInfo' => $expeditionPrizeInfo];
					return $expeditionArray = array_merge($expeditionArray, $expeditionArrayNext);			
				}
				else{
					return $expeditionArray;
				}
				
			}	
		}
	}

?>
