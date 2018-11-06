<?php

class MinesSessions{
	
	public function minesSessionLowLevel(){
		if(isset($_SESSION['low_level'])) 
		{echo $_SESSION['low_level'];}
		unset($_SESSION['low_level']);
	}
	
	public function minesSessionLowCoins(){
		if(isset($_SESSION['low_coins'])) 
		{echo $_SESSION['low_coins'];}
		unset($_SESSION['low_coins']);
	}   
	
	public function minesSessionLowSilver(){
		if(isset($_SESSION['low_silver'])) 
		{echo $_SESSION['low_silver'];}
		unset($_SESSION['low_silver']);
	}   
		
	public function minesSessionLowGold(){
		if(isset($_SESSION['low_gold'])) 
		{echo $_SESSION['low_gold'];}
		unset($_SESSION['low_gold']);
	}   

	public function minesSessionNewMain(){
		if(isset($_SESSION['buy_mines_completed'])) 
		{echo $_SESSION['buy_mines_completed'];}
		unset($_SESSION['buy_mines_completed']);	
	}   	
	

	
}

?>