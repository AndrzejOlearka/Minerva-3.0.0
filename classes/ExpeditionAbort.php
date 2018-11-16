<?php

	class ExpeditionAbort{

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
