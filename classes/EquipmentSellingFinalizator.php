<?php

require_once "../classes/EquipmentOperations.php";

class EquipmentSellingFinalizator extends EquipmentOperations{
	
	public function executeSelling($nr){

		$minerals = $this->showMineralsNamesArray();
		$mineralsSession = $this->showMineralsSessionNamesArray();
		$coins = $this->showMineralsValueArray();	
		$equipmentUserData = $this->getEquipmentUserData();
		
		$insertedAmount[$minerals[$nr]] = $_POST["insert$nr"];
		$receivedCoins = $insertedAmount[$minerals[$nr]]*$coins[$nr];
		$newCoins = $receivedCoins + $equipmentUserData['coins'];
		$newMinerals = $equipmentUserData[$minerals[$nr]] - $insertedAmount[$minerals[$nr]];
		$this->query->updateBindValue(
			"UPDATE user_data 
			SET coins = ? 
			WHERE user = ?", 
			$bindedValues = [$newCoins, $this->userName]);
		$this->query->updateBindValue(
			"UPDATE basic_equipment 
			SET $minerals[$nr] = ? 
			WHERE user = ?", 
			$bindedValues = [$newMinerals, $this->userName]);

		$_SESSION["value"] = $_POST["insert$nr"];
		$_SESSION["coins"] = $receivedCoins;
		$_SESSION["minerals{$minerals[$nr]}"] = $mineralsSession[$nr];
		unset($_POST["insert$nr"]);
	}
}


?>
