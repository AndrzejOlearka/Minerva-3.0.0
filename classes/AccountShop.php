<?php

// obiekt pozwalający na zakup premium lub monet
// object allowing for the purchase of premium or coins

require_once "../classes/AccountOperations.php";

Class AccountShop extends AccountOperations{
		
	public function getPremium($premium){
		$dateTime  = $this->getCurrentDate();
		$timeEnd = $this->getDateTime('user_data', 'premium_end');	
		
		if($timeEnd<$dateTime){					
			if($premium == 1){
				$this->query->updateBindValue("UPDATE user_data SET premium_end = now() + INTERVAL 3 DAY WHERE user = ?", $bindedValues = [$this->userName]);
			}
			else if($premium == 2){
				$this->query->updateBindValue("UPDATE user_data SET premium_end = now() + INTERVAL 7 DAY WHERE user = ?", $bindedValues = [$this->userName]);
			}
			else if($premium == 3){
				$this->query->updateBindValue("UPDATE user_data SET premium_end = now() + INTERVAL 14 DAY WHERE user = ?", $bindedValues = [$this->userName]);	
			}		
		}		
		else{				
			if($premium == 1){
				$this->query->updateBindValue("UPDATE user_data SET premium_end = premium_end + INTERVAL 3 DAY WHERE user = ?", $bindedValues = [$this->userName]);
			}					
			else if($premium == 2){
				$this->query->updateBindValue("UPDATE user_data SET premium_end = premium_end + INTERVAL 7 DAY WHERE user = ?", $bindedValues = [$this->userName]);
			}
			else if($premium == 3){
				$this->query->updateBindValue("UPDATE user_data SET premium_end = premium_end + INTERVAL 14 DAY WHERE user = ?", $bindedValues = [$this->userName]);
			}					
		}
	}		

	public function getCoins($coins){	
		if($coins == 1){
			$this->query->updateBindValue("UPDATE user_data SET coins = coins + 100 WHERE user = ?", $bindedValues = [$this->userName]);
		}					
		else if($coins  == 2){
			$this->query->updateBindValue("UPDATE user_data SET coins = coins + 250 WHERE user = ?", $bindedValues = [$this->userName]);
		}
		else if($coins  == 3){
			$this->query->updateBindValue("UPDATE user_data SET coins = coins + 500 WHERE user = ?", $bindedValues = [$this->userName]);
		}					
	}

}



?>

	