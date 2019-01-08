<?php

	require_once "../classes/ExpeditionsOperations.php";

	class ExpeditionAbort extends ExpeditionsOperations{

		public function stopExpedition(){
			$expeditionNumber = $this->getDeincrementationedExpeditionNumber();
			$minerals = $this->getPrizeInfoArray();
			$coinsRefund = [2, 5, 10, 15, 20, 50, 100, 100, 100, 200, 0, 0];
			for($i = 0; $i<12; $i++){
				if($expeditionNumber == $i){
					$this->query->updateBindValue(
					"UPDATE user_data 
					SET coins = coins + $coinsRefund[$i] 
					WHERE user = ?",
					$bindedVariables = [$this->userName]);
					break;
				}
			}
			$this->query->updateBindValue(
				"UPDATE expeditions_data 
				SET expedition_number = 0, expedition_end = now(), expedition_prize = false
				WHERE user = ?",
				$bindedVariables = [$this->userName]);			
			$_SESSION['expedition_stopped'] = '<div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
				Przerwałeś zadanie z poszukiwaniem '.$minerals[$expeditionNumber].' , 
				odzyskałeś '.$coinsRefund[$i].' monety, wyrusz ponownie na ekspedycję!</div>';
			header('Location: ../controllers/expeditions.php');
			exit();
		}
	}

?>
