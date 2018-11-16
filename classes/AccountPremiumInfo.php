<?php

// skrypt pozwalający na pokazywanie ile zostało premium do końca
// script allowing to show when the premium going to end

class AccountPremiumInfo{

	public static function getInfo(){
		
		$query = require '../core/bootstrap.php';

		$data = $query->select("SELECT * FROM user_data WHERE user = '$userName'");

		$dateTime = new DateTime();
		$dateTime->format('Y-m-d H:i:s');
		$timeEnd = DateTime::createFromFormat('Y-m-d H:i:s', $data['premium_end']);
		$timeDiff = $dateTime->diff($timeEnd);
		$timeEnd->format('Y/m/d H:i:s');
		$time1 = "Pozostało <span style='color: #66cc00'>".$timeDiff->format('%d dni i %h godz,').
			"</span> do zakończenia premium. <span style='color: blue'>Przedłuż już teraz!</span><br />";
		$time2 = "Pozostało <span style='color: #66cc00'>".$timeDiff->format('%h godz, %i min, %s sek').
			"</span> do zakończenia premium. <span style='color: blue'>Przedłuż już teraz!</span><br />";

		if($timeDiff->format('%d dni') == 0  && $dateTime<$timeEnd){
			return $premiumTime = $time2;
		}
		else if($dateTime<$timeEnd){
			return $premiumTime = $time1;
		}
		else if ($dateTime>$timeEnd){
			return $premiumTime = "Premium jest nieaktywne,<span style='color: blue'> zakup już teraz!</span>";
		}	
	}
}
?>
