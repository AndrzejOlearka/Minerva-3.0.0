<?php

require_once "../classes/ExpeditionsOperations.php";

class ExpeditionRequiredCoins extends ExpeditionsOperations{
	
	public static function check($nr){
		$mineral = [2, 5, 10, 15, 20, 50, 100, 100, 100, 200, 500, 500];
		$query = require_once 'DataUser.php';
		if(DataUser::check('coins') <= $mineral[$nr]){
			return true; 
		}
		else{
			return false;
		}
	}
}
?>