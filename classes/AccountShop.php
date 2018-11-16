<?php

// obiekt pozwalający na zakup premium lub monet
// object allowing for the purchase of premium or coins

	Class AccountShop{
			
			public function getPremium($premium){
				
				$query = require '../core/bootstrap.php';	
				$premium = $_POST['premium'];
				$premiumEnd = $query->select("SELECT premium_end, user FROM user_data WHERE user = '$userName'");

				$dateTime = new DateTime();
				$dateTime ->format('Y-m-d H:i:s');
				$timeEnd = DateTime::createFromFormat('Y-m-d H:i:s', $premiumEnd['premium_end']);
				$timeEnd->format('Y-m-d H:i:s');

				if($timeEnd<$dateTime){				
				
					if($premium == 1){
						$query->update("UPDATE user_data SET premium_end = now() + INTERVAL 3 DAY WHERE user = '$userName'");
					}
					else if($premium == 2){
						$query->update("UPDATE user_data SET premium_end = now() + INTERVAL 7 DAY WHERE user = '$userName'");
					}
					else if($premium == 3){
						$query->update("UPDATE user_data SET premium_end = now() + INTERVAL 14 DAY WHERE user = '$userName'");	
					}		
				}
				
				else{		
				
					if($premium == 1){
						$query->update("UPDATE user_data SET premium_end = premium_end + INTERVAL 3 DAY WHERE user = '$userName'");
					}					
					else if($premium == 2){
						$query->update("UPDATE user_data SET premium_end = premium_end + INTERVAL 7 DAY WHERE user = '$userName'");
					}
					else if($premium == 3){
						$query->update("UPDATE user_data SET premium_end = premium_end + INTERVAL 14 DAY WHERE user = '$userName'");
					}					
				}
			}		
	
		public function getCoins($coins){
			
			$coins = $_POST['coins'];
			$query = require '../core/bootstrap.php';
			
			if($coins == 1){
				$query->update("UPDATE user_data SET coins = coins + 100 WHERE user = '$userName'");
			}					
			else if($coins  == 2){
				$query->update("UPDATE user_data SET coins = coins + 250 WHERE user = '$userName'");
			}
			else if($coins  == 3){
				$query->update("UPDATE user_data SET coins = coins + 500 WHERE user = '$userName'");
			}					
		}
	
	}
	


?>

	