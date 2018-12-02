<?php

class LoginSessions{
	
	public function logWrongLoginData(){
		if(isset($_SESSION['e_form_login'])){
			echo $_SESSION['e_form_login'];
			unset ($_SESSION['e_form_login']);
		}   
	}
	
	public function logEmptyInputs(){
		if(isset($_SESSION['e_form_log_inputs'])){
			echo $_SESSION['e_form_log_inputs'];
			unset($_SESSION['e_form_log_inputs']);
		}
	}   
	
	public function logBannedAccount(){
		if(isset($_SESSION['e_banned_account'])){
			echo $_SESSION['e_banned_account'];
			unset($_SESSION['e_banned_account']);
		}
	}   
	
	public function logBannedNick(){
		if(isset($_SESSION['change_nick_form'])){
			echo $_SESSION['change_nick_form'];
		}
	}   
	
	public function logBannedNickChanged(){
		if(isset($_SESSION['log_banned_nick_changed'])){
			echo $_SESSION['log_banned_nick_changed'];
			$_SESSION['postdata'] = $_POST;
			unset($_POST); 
			session_unset();
		}
	}   
	
	public function logBannedNickLength(){
		if(isset($_SESSION['e_changing_nick_length'])){
			echo $_SESSION['e_changing_nick_length'];
			unset($_SESSION['e_changing_nick_length']);
		}
	}   	
	
	public function logBannedNickExist(){
		if(isset($_SESSION['e_changing_nick_exist'])){
			echo $_SESSION['e_changing_nick_exist'];
			unset($_SESSION['e_changing_nick_exist']);
		}
	}   	
	
	public function logBannedNickType(){
		if(isset($_SESSION['e_changing_nick_type'])){
			echo $_SESSION['e_changing_nick_type'];
			unset($_SESSION['e_changing_nick_type']);
		}
	}   	
	
}

?>