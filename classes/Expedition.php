<?php

		class Expedition{

			protected $expeditionNumber;

			public function __construct($expeditionNumber){
				    $this->expeditionNumber = $expeditionNumber;
			}

			public function checkRequiredCoinsLevel($expeditionNumber){

				$query = require '../core/bootstrap.php';
				$data = $query->select("SELECT coins, level FROM user_data WHERE user = '$userName'");

				$requiredLevel = [1, 2, 3, 4, 5, 6, 8, 8, 8, 10, 10, 10];
				$requiredCoins = [2, 5, 10, 15, 20, 50, 100, 100, 100, 200, 0, 0];

				$expeditionNumber = $this->expeditionNumber;
				$expeditionNumber = $expeditionNumber - 1;
				$requiredLevel = $requiredLevel[$expeditionNumber];
				$requiredCoins = $requiredCoins[$expeditionNumber];

				if($data['level']<$requiredLevel){
					$_SESSION['e_low_level']='<div class="error col-10 col-sm-8 offset-1 offset-sm-2">
						Nie osiągnąłeś odpowiedniego levela by móc wykonać tą ekspedycję!</div>';
					header('Location: '.$_SERVER['PHP_SELF']);
					exit();
				}
				if($data['coins']<=$requiredCoins){
					$_SESSION['e_low_coins']='<div class="error col-10 col-sm-8 offset-1 offset-sm-2">
						Nie masz wystarczająco monet by rozpocząć zadanie!</div>';
					header('Location: '.$_SERVER['PHP_SELF']);
					exit();
				}

				$newCoins = $data['coins'] - $requiredCoins;
				$query->update("UPDATE user_data SET coins = '$newCoins' WHERE user = '$userName'");
			}

			public function setExpeditionNumberTime($expeditionNumber){
				$query = require '../core/bootstrap.php';
				$expeditionNumber = $this->expeditionNumber;
				$query->update("UPDATE expeditions_data SET expedition_number = '$expeditionNumber' WHERE user = '$userName'");

				if($expeditionNumber > 0){
					$expeditionNumber = $expeditionNumber - 1;
					$query->update("UPDATE expeditions_data SET expedition_start = now() WHERE user = '$userName'");
					$expeditionsTime = ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'];
					$query->update("UPDATE expeditions_data SET expedition_end = now() +
						INTERVAL '$expeditionsTime[$expeditionNumber]' SECOND WHERE user = '$userName'");
					$query->update("UPDATE expeditions_data SET expedition_prize = true WHERE user = '$userName'");				
				}
			}
		}


?>
