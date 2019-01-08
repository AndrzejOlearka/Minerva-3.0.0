<?php

require_once "../classes/CommonOperations.php";

abstract class EquipmentOperations extends CommonOperations{
	
	protected function getEquipmentUserData(){
		$equipmentUserData = $this->query->selectBindValue
			("SELECT * FROM user_data JOIN basic_equipment JOIN rare_equipment 
			ON user_data.user = basic_equipment.user
			WHERE user_data.user = ? AND basic_equipment.user = ? AND rare_equipment.user = ?", 
			$bindedValues = [$this->userName, $this->userName, $this->userName]);
		return $equipmentUserData;
	}
	
	protected function showMineralsNamesArray(){
		return $minerals = [
			'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes', 'emeralds',
			'rubies', 'sapphires', 'diamonds', 'gold', 'sillver', 'morganites', 'fluorites',
			'opales', 'jadeites', 'painites', 'crystals', 'aquamarines', 'pearls', 'cymophanes'
		];
	}
	
	protected function showMineralsSessionNamesArray(){
		return $mineralsSession = [
			'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
			'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'zlota', 'srebra', 'morganitów', 'fluorytów',
			'opali', 'jadeitów', 'painitów', 'kryształów górskich', 'akwamarynów', 'pereł', 'cymofanów'
		];
	}
	
	protected function showMineralsValueArray(){
		return $coins = [1, 2, 3, 5, 10, 20, 50, 100, 200, 500, 20, 100, 10, 30, 60, 120, 300, 150, 250, 650, 1000];
	}
	
}

?>
