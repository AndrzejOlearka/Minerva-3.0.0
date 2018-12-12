<?php
	// określenie nagrody za wyprawy

	class TripPrize{
		
		public static function addGuildExp($exp){
			
			$query = require '../core/bootstrap.php';
			$guildMemberData = $query->select("SELECT user, id_guild FROM user_data WHERE user = '$userName'");
			$idGuild = $guildMemberData['id_guild'];
			$query->update("UPDATE guilds_data SET guild_exp = guild_exp + $exp WHERE id_guild = '$idGuild'");
			
		}
		
		public function getTripPrize($tripNumber)
		{
			$query = require '../core/bootstrap.php';
			require_once '../core/premium.php';
			$data = $query->select("SELECT * FROM user_data JOIN rare_equipment ON user_data.user=rare_equipment.user WHERE user_data.user = '$userName' AND rare_equipment.user = '$userName'");
			$tripNumber = $tripNumber - 1;
			$idGuild = $data['id_guild'];
			
			$randMin = [1, 80, 2, 4, 3, 10, 40, 20, 8];
			$randMax = [2, 120, 3, 7, 5, 15, 60, 30, 12];
			$randPremium = [3, 150, 5, 10, 9, 25, 80, 40, 16];	
			$minerals = ['jadeites', 'crystals', 'painites', 'fluorites', 'morganites', 'aquamarines', 'opales', 'pearls', 'cymophanes'];
			$mineralsSession = ['jadeitów', 'kryształów górskich', 'painitów', 'fluorytów', 'morganitów', 'akwamarynów', 'opali', 'pereł', 'cymofanów'];			
			$mineralsPrize = $minerals[$tripNumber];
			
			if(isset($_SESSION['only_exp']))
			{
				$newExp= 200+$data['exp'];
				$query->update("UPDATE user_data SET exp = '$newExp' WHERE user = '$userName'");
				unset($_SESSION['only_exp']);
				
				$tripPrizeInfo = "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralsSession[$tripNumber]." zostało zakończone! <br />
				Niestety twoja wyprawa zakończyła się marnie... nie zdobyłeś nic oprócz doświadczenia, które może ci się przydać w przyszłości.  
				Otrzymałeś 200 punktów doświadczenia</div><br />";
				if($idGuild !== 0){
					TripPrize::addGuildExp(200);
				}					
			}	
			else if(isset($_SESSION['only_coins'])){
				$newExp= 400+$data['exp'];
				$query->update("UPDATE user_data SET exp = '$newExp' WHERE user = '$userName'");

				// jeśli ktoś ma premium to 50%+
				// with premium 50%+				
				if($premiumActivated == false){
					$rand = rand(100, 300);
				}
				else{
					$rand = rand(300, 500);
				}
				$newCoins= $rand+$data['coins'];
				$query->update("UPDATE user_data SET coins = '$newCoins' WHERE user = '$userName'");
				unset($_SESSION['only_coins']);					
				$tripPrizeInfo = "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralsSession[$tripNumber]." zostało zakończone!<br />
				Niestety nie znalazłeś tego czego szukałeś, lecz w nagrodę dostaniesz trochę monet i niezbędnego doświadczenia. 
				Otrzymałeś: ".$rand." monet oraz 400 punktów doświadczenia.</div><br />";
				if($idGuild !== 0){
					TripPrize::addGuildExp(400);
				}						
					
			}	
			else if(isset($_SESSION['main_minerals'])){
				$newExp= 800+$data['exp'];
				$query->update("UPDATE user_data SET exp = '$newExp' WHERE user = '$userName'");
				
				// jeśli ktoś ma premium to 50%+
				// with premium 50%+	
				if($premiumActivated == false){
				$rand2 = rand($randMin[$tripNumber],$randMax[$tripNumber]);
				}
				else{
					$rand2 = rand($randMax[$tripNumber], $randPremium[$tripNumber]);
				}
				$mineralsPrize = $minerals[$tripNumber];
				$newMineralsAmount = $rand2+$data[$mineralsPrize];
				$query->update("UPDATE rare_equipment SET $mineralsPrize = $newMineralsAmount WHERE user = '$userName'");
				unset($_SESSION['main_minerals']);			
				$tripPrizeInfo = "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralsSession[$tripNumber]." zostało zakończone!<br />
				Wyprawa okazała się całkowitym sukcesem i znalazłeś legendarny kamień! Otrzymałeś: ".$rand2." ".$mineralsSession[$tripNumber]." oraz 800 punktów doświadczenia</div><br />";
				if($idGuild !== 0){
					TripPrize::addGuildExp(800);
				}						
				
			}	
			$query->update("UPDATE trips_data SET trip_prize = false WHERE user = '$userName'");
			return $tripPrizeInfo;		
		}	
	}
	


?>