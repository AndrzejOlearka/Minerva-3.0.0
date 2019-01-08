<?php

		require_once "../classes/ExpeditionsOperations.php";
		
		class ExpeditionRequest extends ExpeditionsOperations{

			protected $expeditionNumber;

			public function __construct($expeditionNumber){
				parent::__construct();	
				$this->expeditionNumber = $expeditionNumber;
				$this->decreasedExpeditionNumber = $expeditionNumber - 1;
			}
			
			private function setExpeditionTime(){
				$expeditionsTime = ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'];
				return $expeditionsTime[$this->decreasedExpeditionNumber];
			}
			
			private function setRequiredCoins($userCoins){
				$requiredCoins = [2, 5, 10, 15, 20, 50, 100, 100, 100, 200, 0, 0];
				return $newCoins = $userCoins - $requiredCoins[$this->decreasedExpeditionNumber];
			}

			public function setExpeditionNumberTime(){
				$this->query->updateBindValue(
					"UPDATE expeditions_data 
					SET expedition_number = ?
					WHERE user = ?",
					$bindedVariables = [$this->expeditionNumber, $this->userName]
				);
				$this->query->updateBindValue(
					"UPDATE expeditions_data SET 
						expedition_start = now(), 
						expedition_end = now() +INTERVAL ? SECOND, 
						expedition_prize = true WHERE user = ?", $bindedValues = [$this->setExpeditionTime(), $this->userName]
				);
			}
			
			public function setNewCoinsAmount(){
				$dataUserEquipment = $this->query->selectBindValue("SELECT coins FROM user_data WHERE user = ?", $bindedValues = [$this->userName]);
				$this->query->updateBindValue(
					"UPDATE user_data 
					SET coins = ?
					WHERE user = ?", 
					$bindedVariables = [$this->setRequiredCoins($dataUserEquipment['coins']), $this->userName]);
			}		
		}


?>
