<?php

	require_once "../classes/ExpeditionsActions.php";

	class ExpeditionAbort extends ExpeditionsActions{

		public function stopExpedition(){
			$query = require '../core/bootstrap.php';
			$expeditionNumber = $this->getDeincrementationedExpeditionNumber();
			$coinsRefund = [2, 5, 10, 15, 20, 50, 100, 100, 100, 200, 0, 0];
			for($i = 0; $i<12; $i++){
				if($expeditionNumber == $i){
					$query->update("UPDATE user_data SET coins = coins + $coinsRefund[$i]  WHERE user = '$userName'");
					break;
				}
			}
			$query->update("UPDATE expeditions_data SET expedition_number = 0, expedition_end = now() WHERE user = '$userName'");

			$minerals = [
				'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
				'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'zlota', 'srebra'
			];
			$_SESSION['expedition_stopped'] = '<div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
				Przerwałeś zadanie z poszukiwaniem '.$minerals[$expeditionNumber].' , odzyskałeś '.$coinsRefund[$i].' monety, wyrusz ponownie na ekspedycję!</div>';
			$query->update("UPDATE expeditions_data SET expedition_prize = false WHERE user = '$userName'");
			header('Location: ../controllers/expeditions.php');
			exit();
		}
	}

?>
