<?php

// obiekt pozwalający na zakup kopalni oraz otrzymanie nagrody dziennej
// object that allowing for the purchase of mines and receiving a daily prize


class Mines{

	public function buyMine($nr){

		$query = require  '../core/bootstrap.php';
		$equipmentAndMines = $query->select("
			SELECT * FROM user_data JOIN mines_data JOIN basic_equipment 
			ON user_data.user=mines_data.user 
			WHERE user_data.user = '$userName' AND mines_data.user = '$userName' AND basic_equipment.user = '$userName'"
		);

		$mines = [
			'mines_ambers', 'mines_agates', 'mines_malachites', 'mines_turquoises', 'mines_amethysts', 'mines_topazes',
			'mines_emeralds', 'mines_rubies', 'mines_sapphires', 'mines_diamonds', 'mines_gold', 'mines_silver'
		];
		$mineralsSession = [
			'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
		 	'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'złota', 'srebra'
		];
		$values = [1000, 1200, 1400, 1600, 1800, 2000, 2200, 2500, 2500, 2500, 3000, 4000, 6000];
		$golds = [20, 25, 30, 35, 40, 45, 50, 50, 50, 60, 0, 0];
		$silvers = [200, 220, 240, 260, 280, 300, 350, 350, 350, 400, 0, 0];

		$mine = $mines[$nr];
		$value = $values[$nr];
		$gold = $golds[$nr];
		$silver = $silvers[$nr];

		if($equipmentAndMines['level']<10)
			{
				$_SESSION['low_level']=
					'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
						Nie osiągnąłeś wystarczającego poziomu, by móc kupić kopalnię!
					</div><br>';
				header('Location: ../controllers/mines.php');
				exit();
			}
		else{
			if($equipmentAndMines['coins']<$value)
			{
				$_SESSION['low_coins']=
					'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
						Nie masz wystarczająco monet by zakupić kopalnię!
					</div><br>';
				header('Location: ../controllers/mines.php');
				exit();
			}
			else{
				if($equipmentAndMines['gold']<$gold)
				{
					$_SESSION['low_gold']=
						'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
							Nie masz wystarczająco zlota by zakupić kopalnię!
						</div><br>';
					header('Location: ../controllers/mines.php');
					exit();
				}
				else{
					if($equipmentAndMines['silver']<$silver)	{
						$_SESSION['low_silver']=
							'<br /><div class="error col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
								Nie masz wystarczająco srebra by zakupić kopalnię!
							</div><br>';
						header('Location: ../controllers/mines.php');
						exit();
					}
						else{

							$newMineAmount = $equipmentAndMines[$mine] + 1;
							$newCoinsValue = $equipmentAndMines['coins'] - $value;
							$newGoldAmount = $equipmentAndMines['gold'] - $gold;
							$newSilverAmount = $equipmentAndMines['silver'] - $silver;

							$query->update("UPDATE mines_data SET $mine = $newMineAmount WHERE user = '$userName'");
							$query->update("UPDATE user_data SET coins = $newCoinsValue WHERE user = '$userName'");
							$query->update("UPDATE basic_equipment SET gold = $newGoldAmount  WHERE user = '$userName'");
							$query->update("UPDATE basic_equipment SET silver = $newSilverAmount WHERE user = '$userName'");

							if($newMineAmount>=5){$mineName = "kopalni ";}else{$mineName = "kopalnie ";}

							$_SESSION['buy_mines_completed']=
								"<div class='success col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2'>
									Udało ci się zakupić nową kopalnię ".$mineralsSession[$nr]."!<br />
									Posiadasz teraz ".$newMineAmount." ".$mineName.$mineralsSession[$nr]."
								</div><br>";
							header('Location: ../controllers/mines.php');
							exit();
							}
						}
					}
				}
			}

	public function getDailyPrize($nr){

		$query = require  '../core/bootstrap.php';
		$equipmentAndMines = $query->select("
			SELECT * FROM user_data JOIN mines_data JOIN basic_equipment 
			ON user_data.user=mines_data.user 
			WHERE  user_data.user = '$userName' AND mines_data.user = '$userName' AND basic_equipment.user = '$userName'"
		);
		$mines = [
			'mines_ambers', 'mines_agates', 'mines_malachites', 'mines_turquoises', 'mines_amethysts', 'mines_topazes',
		 	'mines_emeralds', 'mines_rubies', 'mines_sapphires', 'mines_diamonds', 'mines_gold', 'mines_silver'
		];
		$minerals = [
			'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes', 'emeralds',
			'rubies', 'sapphires', 'diamonds', 'gold', 'silver'
		];
		$mineralsSession = [
			'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
			'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'złota', 'srebra'
		];
		$randMineralsMin = [200, 150, 120, 80, 50, 30, 16, 8, 4, 1, 20, 5];
		$randMineralsMax = [400, 250, 200, 120, 80, 50, 24, 16, 8, 5, 100, 30];

		$mine = $mines[$nr];
		$mineral = $minerals[$nr];

		if($equipmentAndMines[$mine] > 0){

			$dailyPrize = rand($randMineralsMin[$nr], $randMineralsMax[$nr]);
			$fullDailyPrize = $dailyPrize * $equipmentAndMines[$mine];
			$newMineralAmount = $equipmentAndMines[$mineral] + $fullDailyPrize;
			$query->update("UPDATE basic_equipment SET $mineral = $newMineralAmount WHERE user = '$userName'");

			$_SESSION["daily_Prize$nr"] = "$fullDailyPrize $mineralsSession[$nr]"." ";
			$_SESSION['daily_Prize_Info'] = true;
			$query->update("UPDATE mines_data SET daily_prize = now() + INTERVAL 1 DAY WHERE user = '$userName'");
			
		}
	}
}




?>
