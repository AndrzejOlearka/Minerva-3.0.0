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

	
}

?>