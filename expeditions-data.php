<?php
	// określenie nagrody za ekspedycje

	class ExpeditionPrize{

		public function getExpeditionPrize($expeditionNumber)
		{
			$query = require 'database/bootstrap.php';
			require 'database/premium.php';
			$expeditionNumber = $expeditionNumber - 1;
			$minPrize = [5, 4, 8, 8, 6, 8, 6, 3, 2, 1, 40, 5];
			$maxPrize = [10, 12, 16, 18, 12, 12, 12, 6, 3, 2, 60, 15];
			$premMaxPrize = [15, 16, 24, 24, 18, 18, 8, 4, 3, 80, 25];
			$exp = [200, 400, 750, 1400, 1900, 3700, 14000, 14000, 14000, 26000, 50000, 50000];
			$mineral = [
				'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes',
				'emeralds', 'rubies', 'sapphires', 'diamonds', 'gold', 'silver'
			];
			$mineralPrizeInfo = [
				'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
				'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'zlota', 'srebra'
			];

			$data = $query->select("SELECT * FROM user_data JOIN basic_equipment ON user_data.user = basic_equipment.user
				WHERE user_data.user = '$userName' AND basic_equipment.user = '$userName'");

			// jeśli ktoś ma premium to 50%+
			// with premium 50%+
			if($premiumActivated == false){
				$rand = rand($minPrize[$expeditionNumber],$maxPrize[$expeditionNumber]);
			}
			else{
				$rand = rand($maxPrize[$expeditionNumber], $premMaxPrize[$expeditionNumber]);
			}


			$minerals = $mineral[$expeditionNumber];
			$newAmount = $rand + $data[$minerals];
			$query->update("UPDATE basic_equipment SET $minerals = $newAmount WHERE user = '$userName'");
			$newExp = $exp[$expeditionNumber]+$data['exp'];
			$query->update("UPDATE user_data SET exp = $newExp WHERE user = '$userName'");

			echo "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
				Zadanie z poszukiwaniem ".$mineralPrizeInfo[$expeditionNumber]." zostało zakończone!<br />
				otrzymałeś: ".$rand." ".$mineralPrizeInfo[$expeditionNumber]."  
				oraz ".$exp[$expeditionNumber]." punktów doświadczenia</div><br />";
			$query->update("UPDATE expeditions_data SET expedition_prize = false WHERE user = '$userName'");
		}

	}


	$query = require 'database/bootstrap.php';

	$data = $query->select("SELECT expedition_number, expedition_end, expedition_prize FROM expeditions_data WHERE user = '$userName'");
	$dateTime = new DateTime();
	$dateTime->format('Y-m-d H:i:s');
	$expeditionTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['expedition_end']);
	$expeditionNumber = $data['expedition_number'];

	if($dateTime<$expeditionTime){
		echo "<br />";
		echo "<div><h2 id='czas' data-czas='$expeditionNumber'</h2></div><br />";
	}
	else{
		echo "<h2 id='expedition'>W tej chwili nie wykonujesz żadnych ekspedycji.</h2><br>";

		if($data['expedition_prize'] == true && !isset($_SESSION['expedition_stopped'])){

			$query->update("UPDATE expeditions_data SET expedition_number = 0 WHERE user = '$userName'");
			$expeditionPrize = new ExpeditionPrize();
			$expeditionPrize->getExpeditionPrize($expeditionNumber);
		}
	}
?>
