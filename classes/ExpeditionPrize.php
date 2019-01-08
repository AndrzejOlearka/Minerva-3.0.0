<?php
	// określenie nagrody za ekspedycje
	require_once "../classes/ExpeditionsOperations.php";

	class ExpeditionPrize extends ExpeditionsOperations{
		
		public function getExpeditionPrize($expeditionNumber){
			
			$expeditionNumber = $expeditionNumber - 1;
			$minPrize = $this->getMinimumPrizeArray();
			$maxPrize = $this->getMaximumPrizeArray();
			$premMaxPrize = $this->getPremiumPrizeArray();
			$exp = $this->getExpArray();
			$mineralName = $this->getMineralsNamesArray();
			$mineralNamePrizeInfo = $this->getPrizeInfoArray();

			$dataUserEquipment = $this->query->selectBindValue(
				"SELECT * FROM user_data 
				JOIN basic_equipment ON user_data.user = basic_equipment.user
				WHERE user_data.user = ? AND basic_equipment.user = ?", 
				$bindedVariables = [$this->userName, $this->userName]);

			$this->checkPremiumStatus() ?
			$rand = $this->rollRandomNumbers($maxPrize[$expeditionNumber], $premMaxPrize[$expeditionNumber]) :
			$rand = $this->rollRandomNumbers($minPrize[$expeditionNumber],$maxPrize[$expeditionNumber]);
			
			$minerals = $mineralName[$expeditionNumber];
			$newAmount = $rand + $dataUserEquipment[$minerals];
			$newExp = $exp[$expeditionNumber] + $dataUserEquipment['exp'];
			$this->query->updateBindValue(
				"UPDATE basic_equipment 
				SET $minerals = ? 
				WHERE user = ?", 
				$bindedVariables = [$newAmount, $this->userName]);
			$this->query->updateBindValue(
				"UPDATE user_data 
				SET exp = ? 
				WHERE user = ?", 
				$bindedVariables = [$newExp, $this->userName]);
			$this->query->updateBindValue(
				"UPDATE expeditions_data 
				SET expedition_prize = false 
				WHERE user = ?", 
				$bindedVariables = [$this->userName]);
				
			$this->addGuildExp($dataUserEquipment['id_guild'], $exp[$expeditionNumber]);
			$expeditionPrizeInfo =  "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>
				Zadanie z poszukiwaniem ".$mineralNamePrizeInfo[$expeditionNumber]." zostało zakończone!<br />
				otrzymałeś: ".$rand." ".$mineralNamePrizeInfo[$expeditionNumber]."  
				oraz ".$exp[$expeditionNumber]." punktów doświadczenia.";

			if($dataUserEquipment['id_guild'] == 0){
				return "$expeditionPrizeInfo</div><br />";
			}	
			else{
				return $expeditionPrizeInfo = "$expeditionPrizeInfo<br />
					Exp twojej gildii również zwiększył się również o tą ilość!</div><br />";
			}

		}
	}

?>
