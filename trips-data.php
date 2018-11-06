<?php
	// określenie nagrody za wyprawy

	class TripPrize{
		
		public function getTripPrize($tripNumber)
		{
			$query = require 'database/bootstrap.php';
			require 'database/premium.php';
			$data = $query->select("SELECT * FROM user_data JOIN rare_equipment ON user_data.user=rare_equipment.user WHERE user_data.user = '$userName' AND rare_equipment.user = '$userName'");
			$tripNumber = $tripNumber - 1;
			
			$randMin = [1, 80, 2, 4, 3, 10, 40, 20, 8];
			$randMax = [2, 120, 3, 7, 5, 15, 60, 30, 12];
			$randPremium = [3, 150, 5, 10, 9, 25, 80, 40, 16];	
			$minerals = ['jadeites', 'crystals', 'painites', 'fluorites', 'morganites', 'aquamarines', 'opales', 'pearls', 'cymophanes'];
			$mineralsSession = ['jadeitów', 'kryształów górskich', 'painitów', 'fluorytów', 'morganitów', 'akwamarynów', 'opali', 'pereł', 'cymofanów'];			
			$mineralsPrize = $minerals[$tripNumber];
			
			if(isset($_SESSION['only_exp']))
			{
				$newExp= 20000+$data['exp'];
				$query->update("UPDATE user_data SET exp = '$newExp' WHERE user = '$userName'");
				
				echo "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralsSession[$tripNumber]." zostało zakończone! <br />";
				echo "Niestety twoja wyprawa zakończyła się marnie... nie zdobyłeś nic oprócz doświadczenia, które może ci się przydać w przyszłości. ";
				echo "Otrzymałeś 20000 punktów doświadczenia</div><br />";			
				unset($_SESSION['only_exp']);
				}	
			if(isset($_SESSION['only_coins'])){
				$newExp= 40000+$data['exp'];
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
							
				echo "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralsSession[$tripNumber]." zostało zakończone!"."<br />";
				echo "Niestety nie znalazłeś tego czego szukałeś, lecz w nagrodę dostaniesz trochę monet i niezbędnego doświadczenia. ";
				echo "Otrzymałeś: ".$rand." monet oraz 40000 punktów doświadczenia.</div><br />";		
				unset($_SESSION['only_coins']);					
			}	
			if(isset($_SESSION['main_minerals'])){
				$newExp= 100000+$data['exp'];
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
							
				echo "<br /><div class='success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3'>Zadanie z poszukiwaniem ".$mineralsSession[$tripNumber]." zostało zakończone! "."<br />";
				echo "Wyprawa okazała się całkowitym sukcesem i znalazłeś legendarny kamień! ";
				echo "Otrzymałeś: ".$rand2." ".$mineralsSession[$tripNumber]." oraz 100000 punktów doświadczenia</div><br />";				
				unset($_SESSION['main_minerals']);
			}	
			$query->update("UPDATE trips_data SET trip_prize = false WHERE user = '$userName'");
		}	
	}
	
	$query = require 'database/bootstrap.php';

	$data = $query->select("SELECT * FROM trips_data WHERE user = '$userName'");
	$dateTime = new DateTime();
	$dateTime->format('Y-m-d H:i:s');
	$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $data['trip_end']);
	$tripNumber = $data['trip_number'];	
	
	if($dateTime<$endTime){
		echo "<br />";
		echo "<h2>W tej chwili wykonujesz wyprawę ".$data['trip_number']."</h2><br>";
		echo "<div><h2 id='czas' data-czas='$tripNumber'</h2></div><br />";	
	}
	else{
		echo "<h2 id='trip'>W tej chwili nie wykonujesz żadnych wypraw.</h2><br>";	
		
		if($data['trip_prize'] == true && !isset($_SESSION['trip_stopped'])){ 
			$query->update("UPDATE trips_data SET trip_number = 0 WHERE user = '$userName'");

			$tripPrize = new TripPrize();
			$tripPrize->getTripPrize($tripNumber);
		}
	}

?>