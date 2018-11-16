<?php

// obiekt pozwalający na sprzedaż minerałów
// object that allows to sell minerals

class EquipmentShop{

	public function sell($nr){

		$query = require '../core/bootstrap.php';
		$equipment = $query->select
			("SELECT * FROM user_data JOIN basic_equipment JOIN rare_equipment ON user_data.user = basic_equipment.user
			WHERE user_data.user = '$userName' AND basic_equipment.user = '$userName' AND rare_equipment.user = '$userName'");

		$minerals = [
			'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes', 'emeralds',
			'rubies', 'sapphires', 'diamonds', 'gold', 'sillver', 'morganites', 'fluorites',
			'opales', 'jadeites', 'painites', 'crystals', 'aquamarines', 'pearls', 'cymophanes'
		];
		$mineralsSession = [
			'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
			'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'zlota', 'srebra', 'morganitów', 'fluorytów',
			'opali', 'jadeitów', 'painitów', 'kryształów górskich', 'akwamarynów', 'pereł', 'cymofanów'
		];
		$coins = [1, 2, 3, 5, 10, 20, 50, 100, 200, 500, 20, 100, 10, 30, 60, 120, 300, 150, 250, 650, 1000];

		$mineral = $minerals[$nr];
		$mineralSession = $mineralsSession[$nr];
		$coin = $coins[$nr];

		if (is_numeric($_POST["insert$nr"]) == false){
			$_SESSION['e_no_int'] ='<br /><div class="error col-8 offset-2">
				<p>Nie możesz sprzedać litery... co nie? Wpisz liczby!</p></div>';
			header('Location: ../controllers/equipment.php');
			exit();
		}
		else
		{
			$s[$mineral] = $_POST["insert$nr"];
			if ($_POST["insert$nr"] > $equipment[$mineral]){
				$_SESSION['e_wrong_amount']='<br /><div class="error col-8 offset-2">
					<p>Nie posiadasz tyle kamieni!</p></div>';
			header('Location: ../controllers/equipment.php');
			exit();
			}
			else{

				if(($_POST["insert$nr"]) == 0){
					$_SESSION['e_zero_input'] ='<br /><div class="error col-8 offset-2">
						<p>Nie możesz sprzedać zera!</p></div>';
				header('Location: ../controllers/equipment.php');
				exit();
				}
				else{

					$coin1 = $s[$mineral]*$coin;
					$newCoins = $coin1 + $equipment['coins'];
					$query->update("UPDATE user_data SET coins = $newCoins WHERE user = '$userName'");

					$newMinerals = $equipment[$mineral] - $s[$mineral];
					$query->update("UPDATE basic_equipment SET $minerals[$nr] = $newMinerals WHERE user = '$userName'");

					$_SESSION["value"] = $_POST["insert$nr"];
					$_SESSION["coins"] = $coin1;
					$_SESSION["minerals$mineral"] = $mineralSession;
					unset($_POST);
				}
			}
		}
	}
}



?>
