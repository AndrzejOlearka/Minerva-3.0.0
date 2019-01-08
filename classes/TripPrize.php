<?php
	// określenie nagrody za wyprawy
	
	require_once "../classes/TripsOperations.php";
	
	class TripPrize extends TripsOperations{
		
		public function getTripPrize($tripNumber){
			$tripNumber = $tripNumber - 1;
			$minPrize = $this->getMinimumPrizeArray();
			$maxPrize = $this->getMaximumPrizeArray();
			$premMaxPrize = $this->getPremiumPrizeArray();
			$mineralName = $this->getMineralsNamesArray();
			$mineralNamePrizeInfo = $this->getPrizeInfoArray();
			
			$dataUserEquipment = $this->query->selectBindValue(
				"SELECT * FROM user_data 
				JOIN rare_equipment ON user_data.user=rare_equipment.user 
				WHERE user_data.user = ? AND rare_equipment.user = ?",
			$bindedVariables = [$this->userName, $this->userName]);	
			
			$mineralsPrize = $mineralName[$tripNumber];
			
			if(isset($_SESSION['only_exp']))
			{
				$newExp= 200+$dataUserEquipment['exp'];
				$this->query->updateBindValue(
					"UPDATE user_data 
					SET exp = ? 
					WHERE user = ?",
					$bindedVariables = [$newExp, $this->userName]);	
				unset($_SESSION['only_exp']);
				
				$tripPrizeInfo = "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralNamePrizeInfo[$tripNumber]." zostało zakończone! <br />
				Niestety twoja wyprawa zakończyła się marnie... nie zdobyłeś nic oprócz doświadczenia, które może ci się przydać w przyszłości.  
				Otrzymałeś 200 punktów doświadczenia</div><br />";
				$this->addGuildExp($dataUserEquipment['id_guild'], 200);								
			}	
			else if(isset($_SESSION['only_coins'])){
				$this->checkPremiumStatus() ?
				$rand = $this->rollRandomNumbers(300, 500):
				$rand = $this->rollRandomNumbers(100, 300);
				$newCoins = $rand+$dataUserEquipment['coins'];	
				$newExp= 400+$dataUserEquipment['exp'];
				$this->query->updateBindValue(
					"UPDATE user_data 
					SET coins = ?, exp = ? 
					WHERE user = ?", 
					$array = [$newCoins, $newExp, $this->userName]);
				unset($_SESSION['only_coins']);					
				$tripPrizeInfo = "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralNamePrizeInfo[$tripNumber]." zostało zakończone!<br />
				Niestety nie znalazłeś tego czego szukałeś, lecz w nagrodę dostaniesz trochę monet i niezbędnego doświadczenia. 
				Otrzymałeś: ".$rand." monet oraz 400 punktów doświadczenia.</div><br />";
				$this->addGuildExp($dataUserEquipment['id_guild'], 400);								
			}	
			else if(isset($_SESSION['main_minerals'])){
				$newExp= 800+$dataUserEquipment['exp'];
				$this->query->updateBindValue(
					"UPDATE user_data 
					SET coins = ? 
					WHERE user = ?", 
					$array = [$newExp, $this->userName]);			
			
				$this->checkPremiumStatus() ?
				$rand2 = $this->rollRandomNumbers($randMaxMineralPrize[$tripNumber], $randPremiumMineralPrize[$tripNumber]):
				$rand2 = $this->rollRandomNumbers($randMinMineralPrize[$tripNumber],$randMaxMineralPrize[$tripNumber]);

				$mineralsPrize = $mineralName[$tripNumber];
				$newMineralsAmount = $rand2+$dataUserEquipment[$mineralsPrize];
				$this->query->updateBindValue(
					"UPDATE rare_equipment 
					SET $mineralsPrize = ? 
					WHERE user = ?", 
					$array = [$newMineralsAmount, $this->userName]);
				unset($_SESSION['main_minerals']);			
				$tripPrizeInfo = "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralNamePrizeInfo[$tripNumber]." zostało zakończone!<br />
				Wyprawa okazała się całkowitym sukcesem i znalazłeś legendarny kamień! Otrzymałeś: ".$rand2." ".$mineralNamePrizeInfo[$tripNumber]." oraz 800 punktów doświadczenia</div><br />";
				$this->addGuildExp($dataUserEquipment['id_guild'], 800);			
									
			}	
			$this->query->updateBindValue(
				"UPDATE trips_data 
				SET trip_prize = false 
				WHERE user = ?", 
				$array = [$this->userName]);
			return $tripPrizeInfo;		
		}	
	}
	


?>