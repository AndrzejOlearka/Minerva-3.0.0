<?php

		class ExpeditionInitiation{

			protected $expeditionNumber;

			public function __construct($expeditionNumber){
				$this->expeditionNumber = $expeditionNumber;
			}

			public function setNewCoinsAmount($expeditionNumber){
				$query = require '../core/bootstrap.php';
				$data = $query->select("SELECT coins, level FROM user_data WHERE user = '$userName'");

				$requiredCoins = [2, 5, 10, 15, 20, 50, 100, 100, 100, 200, 0, 0];

				$expeditionNumber = $this->expeditionNumber - 1;
				$requiredCoins = $requiredCoins[$expeditionNumber];
				$newCoins = $data['coins'] - $requiredCoins;
				$query->update("UPDATE user_data SET coins = '$newCoins' WHERE user = '$userName'");
			}

			public function setExpeditionNumberTime($expeditionNumber){
				$query = require '../core/bootstrap.php';
				$query->update("UPDATE expeditions_data SET expedition_number = '$expeditionNumber' WHERE user = '$userName'");

				if($expeditionNumber > 0){
					$expeditionNumber = $this->expeditionNumber - 1;
					$expeditionsTime = ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'];
					$query->update
						("UPDATE expeditions_data SET 
							expedition_start = now(), 
							expedition_end = now() +INTERVAL '$expeditionsTime[$expeditionNumber]' SECOND, 
							expedition_prize = true WHERE user = '$userName'"
						);
	
				}
			}
		}


?>
