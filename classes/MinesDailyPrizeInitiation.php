<?php

// obiekt pozwalający na zakup kopalni oraz otrzymanie nagrody dziennej
// object that allowing for the purchase of mines and receiving a daily prize


class MinesDailyPrizeInitiation{

	public function getDailyPrize($nr){

		$query = require  '../core/bootstrap.php';
		$equipmentAndMines = $query->selectBindValue("
			SELECT * FROM user_data 
			JOIN mines_data JOIN basic_equipment 
			ON user_data.user=mines_data.user 
			WHERE  user_data.user = ? AND mines_data.user = ? AND basic_equipment.user = ?",
			$array = [$userName, $userName, $userName]
		);
		$minesNames = [
			'mines_ambers', 'mines_agates', 'mines_malachites', 'mines_turquoises', 'mines_amethysts', 'mines_topazes',
		 	'mines_emeralds', 'mines_rubies', 'mines_sapphires', 'mines_diamonds', 'mines_gold', 'mines_silver'
		];
		$mineralsNames = [
			'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes', 'emeralds',
			'rubies', 'sapphires', 'diamonds', 'gold', 'silver'
		];
		$mineralsSessionNames = [
			'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
			'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'złota', 'srebra'
		];
		$randMineralsMin = [200, 150, 120, 80, 50, 30, 16, 8, 4, 1, 20, 5];
		$randMineralsMax = [400, 250, 200, 120, 80, 50, 24, 16, 8, 5, 100, 30];

		$mine = $minesNames[$nr];
		$mineral = $mineralsNames[$nr];

		if($equipmentAndMines[$mine] > 0){

			$dailyPrize = rand($randMineralsMin[$nr], $randMineralsMax[$nr]);
			$fullDailyPrize = $dailyPrize * $equipmentAndMines[$mine];
			$newMineralAmount = $equipmentAndMines[$mineral] + $fullDailyPrize;
			$query->updateBindValue(
				"UPDATE basic_equipment 
				SET $mineral = ? 
				WHERE user = ?", 
				$array = [$userName, $newMineralAmount]
			);
			$_SESSION["daily_Prize$nr"] = "$fullDailyPrize $mineralsSessionNames[$nr]"." ";
			$_SESSION['daily_Prize_Info'] = true;
			$query->updateBindValue(
				"UPDATE mines_data 
				SET daily_prize = now() + INTERVAL 1 DAY 
				WHERE user = ?", 
				$array = [$userName]
			);		
		}
	}
}




?>
