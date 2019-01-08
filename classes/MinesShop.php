<?php

// obiekt pozwalający na zakup kopalni oraz otrzymanie nagrody dziennej
// object that allowing for the purchase of mines and receiving a daily prize


class MinesShop{

	public function buyMine($nr){

		$query = require  '../core/bootstrap.php';
		$equipmentAndMines = $query->selectBindValue("
			SELECT * FROM user_data 
			JOIN mines_data JOIN basic_equipment 
			ON user_data.user = mines_data.user 
			WHERE user_data.user = ? AND mines_data.user = ? AND basic_equipment.user = ?", 
			$bindedValues = [$userName, $userName, $userName]
		);

		$minesName = [
			'mines_ambers', 'mines_agates', 'mines_malachites', 'mines_turquoises', 'mines_amethysts', 'mines_topazes',
			'mines_emeralds', 'mines_rubies', 'mines_sapphires', 'mines_diamonds', 'mines_gold', 'mines_silver'
		];
		$mineralsSessionName = [
			'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
		 	'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'złota', 'srebra'
		];
		$costs = [1000, 1200, 1400, 1600, 1800, 2000, 2200, 2500, 2500, 2500, 3000, 4000, 6000];
		$golds = [20, 25, 30, 35, 40, 45, 50, 50, 50, 60, 0, 0];
		$silvers = [200, 220, 240, 260, 280, 300, 350, 350, 350, 400, 0, 0];

		$mine = $minesName[$nr];
		$cost = $costs[$nr];
		$gold = $golds[$nr];
		$silver = $silvers[$nr];

		if($equipmentAndMines['level'] < 10)
		{
			$_SESSION['low_level']=
				'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
					Nie osiągnąłeś wystarczającego poziomu, by móc kupić kopalnię!
				</div><br>';
			header('Location: ../controllers/mines.php');
			exit();
		}
		else{
			if($equipmentAndMines['coins'] < $cost)
			{
				$_SESSION['low_coins']=
					'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
						Nie masz wystarczająco monet by zakupić kopalnię!
					</div><br>';
				header('Location: ../controllers/mines.php');
				exit();
			}
			else{
				if($equipmentAndMines['gold'] < $gold)
				{
					$_SESSION['low_gold']=
						'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
							Nie masz wystarczająco zlota by zakupić kopalnię!
						</div><br>';
					header('Location: ../controllers/mines.php');
					exit();
				}
				else{
					if($equipmentAndMines['silver'] < $silver)	{
						$_SESSION['low_silver']=
							'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
								Nie masz wystarczająco srebra by zakupić kopalnię!
							</div><br>';
						header('Location: ../controllers/mines.php');
						exit();
					}
					else{

						$newMineAmount = $equipmentAndMines[$mine] + 1;
						$newCoinsValue = $equipmentAndMines['coins'] - $cost;
						$newGoldAmount = $equipmentAndMines['gold'] - $gold;
						$newSilverAmount = $equipmentAndMines['silver'] - $silver;

						$query->updateBindValue(
							"UPDATE mines_data 
							SET $mine = ? 
							WHERE user = ?", 
							$bindedValues = [$newMineAmount, $userName]
						);
						$query->updateBindValue(
							"UPDATE user_data 
							SET coins = ? 
							WHERE user = ?", 
							$bindedValues = [$newCoinsValue, $userName]
						);
						$query->updateBindValue(
							"UPDATE basic_equipment 
							SET gold = ? 
							WHERE user = ?", 
							$bindedValues = [$newGoldAmount, $userName]
						);
						$query->updateBindValue(
							"UPDATE basic_equipment 
							SET silver = ? 
							WHERE user = ?", 
							$bindedValues = [$newSilverAmount, $userName]
						);

						if($newMineAmount>=5){$mineName = "kopalni ";}else{$mineName = "kopalnie ";}

						$_SESSION['buy_mines_completed']=
							"<div class='success col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2'>
								Udało ci się zakupić nową kopalnię ".$mineralsSessionName[$nr]."!<br />
								Posiadasz teraz ".$newMineAmount." ".$mineName.$mineralsSessionName[$nr]."
							</div><br>";
						header('Location: ../controllers/mines.php');
						exit();
					}
				}
			}
		}
	}
}




?>
