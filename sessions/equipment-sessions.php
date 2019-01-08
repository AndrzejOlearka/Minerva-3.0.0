<?php

class EquipmentSessions{
	
	public function eqSellSuccess(){
		
$mineral = [
	'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes', 
	'emeralds', 'rubies', 'sapphires', 'diamonds', 'gold', 'sillver', 'morganites', 'fluorites', 
	'opales', 'jadeites', 'painites', 'crystals', 'aquamarines', 'pearls', 'cymophanes'
];
			
		for($nr = 0; $nr<=20; $nr++){
			if(isset($_SESSION["coins"]) && isset($_SESSION["minerals{$mineral[$nr]}"])){
				echo "<br /><h2>Sprzedałeś ".$_SESSION["value"]." ".$_SESSION["minerals{$mineral[$nr]}"].
				" o łącznej wartości <span style='color:#ff9900'>".$_SESSION["coins"]." </span>monet!<br /></h2>";
				unset($_SESSION["coins"]);
				unset($_SESSION["value"]);
				unset($_SESSION["minerals$mineral[$nr]"]); 
			}
		}		
	}	

	public function eqSellErrorInt(){
		if(isset($_SESSION['e_no_int'])) 
		echo $_SESSION['e_no_int'];
		unset($_SESSION['e_no_int']);
	}
	public function eqSellErrorAmount(){
		if(isset($_SESSION['e_wrong_amount'])) 
		echo $_SESSION['e_wrong_amount'];
		unset($_SESSION['e_wrong_amount']);
	}
	public function eqSellErrorZero(){
		if(isset($_SESSION['e_zero_input'])) 
		echo $_SESSION['e_zero_input'];
		unset($_SESSION['e_zero_input']);
	}	

}

?>