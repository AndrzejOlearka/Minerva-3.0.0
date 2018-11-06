<?php

class ExpeditionsSessions{
	
	public function expErrorLowLevel(){
			if(isset($_SESSION['e_low_level']))
			{echo $_SESSION['e_low_level'];}
			unset($_SESSION['e_low_level']);
	}
	public function expErrorLowCoins(){
			if(isset($_SESSION['e_low_coins']))
			{echo $_SESSION['e_low_coins'];}
			unset($_SESSION['e_low_coins']);
	}
	public function expErrorStoppedExpedition(){
			if(isset($_SESSION['expedition_stopped']))
			{echo $_SESSION['expedition_stopped'];}
			unset($_SESSION['expedition_stopped']);
	}
}

?>