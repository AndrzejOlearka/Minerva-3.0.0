<?php

	$query = require  'database/bootstrap.php';

	$equipment = $query->select("SELECT * FROM user_data JOIN mines_data JOIN basic_equipment ON user_data.user=mines_data.user WHERE  user_data.user = '$userName' AND mines_data.user = '$userName' AND basic_equipment.user = '$userName'");
	
	$data = getdate();
	$rok = $data["year"];
	$miesiac = $data["mon"];
	$dzien = $data['mday'];
	if($dzien<10) $dzien="0".$dzien;
	if($miesiac<10) $miesiac="0".$miesiac;
	$dataczas = "$rok-$miesiac-$dzien";

	if($dataczas >= $equipment['daily_prize'])
	{
		echo "<br /><h2>Do odebrania masz nagrodę za wczorajszą pracę kopalni!</h2><br />";
		echo '<div class="dailyPrize col-10 col-sm-8 col-lg-4 offset-1 offset-sm-2 offset-lg-4"><form action="mines-server.php" method="post"><input type="hidden" name="dailyPrize" value="dailyPrize"/><input type="submit" name="dailyPrize" value="Odbierz nagrodę!"/></form></div>';			
	}
	else{
				for($nr = 0; $nr<12; $nr++){
			if(isset($_SESSION["daily_Prize$nr"])){
				if($nr === 0){
					echo '<div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">Z wczorajszej nagrody otrzymałeś: ';
				}
				echo $_SESSION["daily_Prize$nr"];
				unset($_SESSION["daily_Prize$nr"]);
			}	
			if($nr === 11){
			echo '</div>';
			}
		}
	}
	


?>