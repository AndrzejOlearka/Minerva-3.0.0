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
						<p>Nie osiągnąłeś odpowiedniego levela by móc wykonać tą ekspedycję!</p></div>';
					header('Location: '.$_SERVER['PHP_SELF']);
					exit();
				}
				if($data['coins']<=$requiredCoins){
					$_SESSION['e_low_coins']='<div class="error col-10 col-sm-8 offset-1 offset-sm-2">
						<p>Nie masz wystarczająco monet by rozpocząć zadanie!</p></div>';
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


			/* pobieranie czasu potrzebnego do wyświetlania czasu zakończenia
			 zadania w AJAX na ekspedycje.php po kliknięciu rozpoczęcia zadania lub odświeżeniu*/

	class ExpeditionEndTime{

		public function getEndTime(){

			$query = require '../core/bootstrap.php';
			$expeditionEndTime = $query->select("SELECT expedition_end FROM expeditions_data WHERE user = '$userName'");
			$dateTime = new DateTime();
			$dateTime->format('Y-m-d H:i:s');
			$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $expeditionEndTime['expedition_end']);
			$diffTime = $dateTime->diff($endTime);
			$endTime->format('Y/m/d H:i:s');
			$czas = "Pozostało ".$diffTime->format('%h godz, %i min, %s sek')." do zakończenia zadania<br />";
			$stampEndTime = strtotime($endTime->format('Y/m/d H:i:s'));
			return $ajaxJsonData = $stampEndTime*1000;
		}
	}



	class AbortExpedition{

		public function stopExpedition(){

			$query = require '../core/bootstrap.php';
			$expeditionNumber = $query->select("SELECT expedition_number FROM expeditions_data WHERE user = '$userName'");
			$expeditionNumber = $expeditionNumber['expedition_number'] - 1;
			$coinsRefund = [2, 5, 10, 15, 20, 50, 100, 100, 100, 200, 0, 0];
			for($i = 0; $i<12; $i++){
				if($expeditionNumber == $i){
					$query->update("UPDATE user_data SET coins = coins + $coinsRefund[$i]  WHERE user = '$userName'");
					break;
				}
			}
			$query->update("UPDATE expeditions_data SET expedition_number = 0 WHERE user = '$userName'");
			$query->update("UPDATE expeditions_data SET expedition_end = now() WHERE user = '$userName'");

			$minerals = [
				'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
				'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'zlota', 'srebra'
			];
			$_SESSION['expedition_stopped'] = '<div class="error col-10 col-sm-8 offset-1 offset-sm-2">
				<p>Przerwałeś zadanie z poszukiwaniem '.$minerals[$expeditionNumber].' , odzyskałeś '.$coinsRefund[$i].' monety, wyrusz ponownie na ekspedycję!</p></div>';
			$query->update("UPDATE expeditions_data SET expedition_prize = false WHERE user = '$userName'");
			header('Location: ../controllers/expeditions.php');
			exit();
		}
	}




?>
