<?php

class RegistrationSessions{
	
	public function regNickLength(){
		if(isset($_SESSION['e_nick_reg_length'])){
			echo $_SESSION['e_nick_reg_length'];
			unset ($_SESSION['e_nick_reg_length']);
		}   
	}
	
	public function regNickSigns(){
		if(isset($_SESSION['e_nick_reg_signs'])){
			echo $_SESSION['e_nick_reg_signs'];
			unset($_SESSION['e_nick_reg_signs']);
		}
	}   

	public function regNickExist(){
		if(isset($_SESSION['e_nick_reg_exist'])){
			echo $_SESSION['e_nick_reg_exist'];
			unset($_SESSION['e_nick_reg_exist']);
		}
	}   
	
	public function regEmailValid(){
		if(isset($_SESSION['e_email_reg_valid'])){
			echo $_SESSION['e_email_reg_valid'];
			unset($_SESSION['e_email_reg_valid']);
		}
	}   
		
	public function regEmailExist(){
		if(isset($_SESSION['e_email_reg_exist'])){
			echo $_SESSION['e_email_reg_exist'];
			unset($_SESSION['e_email_reg_exist']);
		}
	}   

	public function regPasswordLength(){
		if(isset($_SESSION['e_password_reg_length'])){
			echo $_SESSION['e_password_reg_length'];
			unset($_SESSION['e_password_reg_length']);
		}
	}   	
	
	public function regPasswordEqual(){
		if(isset($_SESSION['e_password_reg_equal'])){
			echo $_SESSION['e_password_reg_equal'];
			unset($_SESSION['e_password_reg_equal']);
		}
	}   	

	public function regEmptyInputs(){
		if(isset($_SESSION['e_form_reg_inputs'])){
			echo $_SESSION['e_form_reg_inputs'];
			unset($_SESSION['e_form_reg_inputs']);
		}
	}   	
	
	public function regNickSession(){
		if(isset($_SESSION['nick_session'])){
			echo $_SESSION['nick_session'];
			unset($_SESSION['nick_session']);
		}
	}   	
	
	public function regEmailSession(){
		if(isset($_SESSION['email_session'])){
			echo $_SESSION['email_session'];
			unset($_SESSION['email_session']);
		}
	}   	
	
}

?>