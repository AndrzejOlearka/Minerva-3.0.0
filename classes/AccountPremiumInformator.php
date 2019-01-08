<?php

// skrypt pozwalający na pokazywanie ile zostało premium do końca
// script allowing to show when the premium going to end

require_once "../classes/AccountOperations.php";

class AccountPremiumInformator extends AccountOperations{

	public function getPremiumInfo(){

		$dateTime = $this->getCurrentDate();
		$timeEnd = $this->getDateTime('user_data', 'premium_end');	
		$timeDiff = $this->getDateTimeDiff('user_data', 'premium_end');		

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
