<?php

class AccountSessions{
	
	public function accNickChangedSuccess(){
		if(isset($_SESSION['nick_change_success'])){
			echo $_SESSION['nick_change_success'];
			unset($_SESSION['nick_change_success']);
		} 
	}
	
	public function accNickErrorLength(){
		if(isset($_SESSION['e_change_nick_length'])){
			echo $_SESSION['e_change_nick_length'];
			unset($_SESSION['e_change_nick_length']);
		} 
	}
	
	public function accNickErrorSigns(){
		if(isset($_SESSION['e_change_nick_signs'])){
			echo $_SESSION['e_change_nick_signs'];
			unset($_SESSION['e_change_nick_signs']);
		} 
	}
	
	public function accNickErrorIdentical(){
		if(isset($_SESSION['e_change_nick_identical'])){
			echo $_SESSION['e_change_nick_identical'];
			unset($_SESSION['e_change_nick_identical']);
		} 
	}
}

?>




