<?php

require_once "../classes/EquipmentOperations.php";

class EquipmentSellingValidator extends EquipmentOperations{
	
	public function sanitizeInsertedNumber($nr){
		if (is_numeric($_POST["insert$nr"]) == false){
			$_SESSION['e_no_int'] ='<br /><div class="error col-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3">
				Nie możesz sprzedać litery lub niczego... co nie? Wpisz liczby!</div>';
			header('Location: ../controllers/equipment.php');
			exit();
		}
		else{
			if(($_POST["insert$nr"]) == 0){
			$_SESSION['e_zero_input'] ='<br /><div class="error col-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3">
				Nie możesz sprzedać zera!</div>';
			header('Location: ../controllers/equipment.php');
			exit();
			}
			else{
				return true;
			}
		}			
	}
	
	public function validateInsertedNumber($nr){

		$equipmentUserData = $this->getEquipmentUserData();
		$minerals = $this->showMineralsNamesArray();
		$mineralsSession = $this->showMineralsSessionNamesArray();
		
		if ($_POST["insert$nr"] > $equipmentUserData[$minerals[$nr]]){
			$_SESSION['e_wrong_amount']='<br /><div class="error col-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3">
				Nie posiadasz tyle '.$mineralsSession[$nr].'!</div>';
		header('Location: ../controllers/equipment.php');
		exit();
		}
		else{
			return true;
		}
	}
}


?>
