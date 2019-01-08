<?php
	// określenie nagrody za ekspedycje

	require_once "../classes/ExpeditionsOperations.php";
	
	class ExpeditionFinish extends ExpeditionsOperations{
		
			public function __construct(){
				parent::__construct();	
				$this->expeditionNumber = $this->getExpeditionNumber();
			}
		
		private function getExpeditionPrize($expeditionNumber){
			require '../classes/ExpeditionPrize.php';	
			$this->query->updateBindValue(
				"UPDATE expeditions_data 
				SET expedition_number = 0 
				WHERE user = ?",
				$bindedVariables = [$this->userName]);
			$expeditionPrize = new ExpeditionPrize();
			return $expeditionPrizeInfo = $expeditionPrize->getExpeditionPrize($expeditionNumber);		
		}	
		
		private function getPrizePermission(){
			$dataUserPrizePermission = $this->query->selectBindValue(
				"SELECT expedition_prize 
				FROM expeditions_data 
				WHERE user = ?",
				$bindedVariables = [$this->userName]);
			return $dataUserPrizePermission = $dataUserPrizePermission['expedition_prize'];
		}
		
		public function showExpeditionDetails(){
			if($this->getCurrentDate() < $this->getExpeditionEndTime()){
				$postRefreshAjax = "<br /><div><h2 id='czas' data-czas='".$this->expeditionNumber."'></h2></div><br />";
				return $expeditionArray = ['postRefreshAjax' => $postRefreshAjax];
			}
			else{
				$expeditionInfo = "<h2 id='expedition'>W tej chwili nie wykonujesz żadnych ekspedycji.</h2><br>";
				$expeditionArray = ['expeditionInfo' => $expeditionInfo];
				
				if($this->getPrizePermission() == true && !isset($_SESSION['expedition_stopped'])){
					$expeditionPrizeInfo = $this->getExpeditionPrize($this->expeditionNumber );				
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
