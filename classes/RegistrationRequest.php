<?php

require_once "../classes/RegistrationOperations.php";

class RegistrationRequest extends RegistrationOperations{
		
	public function __construct(){
			parent::__construct();
			$this->nick = filter_input(INPUT_POST, 'nick');
			$this->password = filter_input(INPUT_POST, 'password');
			$this->password2 = filter_input(INPUT_POST, 'password2');
			$this->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);			
			$this->passwordHash = password_hash($this->password, PASSWORD_DEFAULT);	
			$this->permission = true;
	}
	
	private function rememberInsertedData(){
		$_SESSION['nick_session'] = $this->nick;
		$_SESSION['email_session'] = $this->email;
	}
	
	private function sanitazeNickType(){
		if (ctype_alnum($this->nick) == false){
			$_SESSION['e_nick_reg_signs'] = '<div class="error col-12">Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!</div>';
			return $this->permission = false;
		}
	}
	
	private function validateNickLength(){
		if((strlen($this->nick)<5) || (strlen($this->nick)>20)){
			$_SESSION['e_nick_reg_length'] = '<div class="error col-12">Nick musi posiadać od 5 do 20 znaków!</div>';
			return $this->permission = false;
		}
	}
	
	private function checkUserExists(){
		$userExists = $this->query->countRowsBindValue('SELECT id FROM user_data WHERE user = ?', $bindedValues = [$this->nick]);
		if($userExists !== 0){
			$_SESSION['e_nick_reg_exist']='<div class="error col-12">Istnieje już gracz o takim nicku, wybierz inny!</div>';	
			return $this->permission = false;
		} 	
	}
	
	private function sanitazeEmailType(){
		if (ctype_alnum($this->nick) == false){
			$_SESSION['e_nick_reg_signs'] = '<div class="error col-12">Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!</div>';
			return $this->permission = false;
		}
	}
	
	private function sanitazeEmail(){
		if (empty($this->email)){
			$_SESSION['e_email_reg_valid']='<div class="error col-12">Podaj poprawny adres e-mail</div>';
			return $this->permission = false;
		}
	}
	
	private function checkEmailExists(){
		$emailExists = $this->query->countRowsBindValue('SELECT email FROM user_data WHERE user = ?', $bindedValues = [$this->nick]);
		if($emailExists !== 0){
			$_SESSION['e_email_reg_exist']='<div class="error col-12">Istnieje już konto przypisane do tego adresu email!</div>';		
			return $this->permission = false;
		} 	
	}
	
	private function validatePasswordLength(){
		if((strlen($this->password) <5) || (strlen($this->password) > 20)){
			$_SESSION['e_password_reg_length']='<div class="error col-12">Hasło musi posiadać od 5 do 20 znaków!</div>';	
			return $this->permission = false;
		}
	}
	
	private function checkPasswordidentity(){
		if ($this->password != $this->password2){
			$_SESSION['e_password_reg_equal']='<div class="error col-12">Podane hasła nie są identyczne</div>';
			return $this->permission = false;
		}
	}
	
	public function initiateRegistration(){
		$this->rememberInsertedData();
		$this->sanitazeNickType();
		$this->validateNickLength();
		$this->checkUserExists();
		$this->sanitazeEmail();
		$this->checkEmailExists();
		$this->validatePasswordLength();
		$this->checkPasswordidentity();
		if($this->permission == true){
			return true;
		}
		else{
			header ('Location: ../controllers/registration.php');
			exit();
		}
	}
	
	public function finalizeRegistration(){			
		$this->query->updateBindValue("INSERT INTO user_data VALUES (NULL, ?, ?, ?, 1, 1, now() + INTERVAL 3 DAY, 5, 0)", $bindedValues = [$this->nick, $this->passwordHash, $this->email]);
		$this->query->updateBindValue("INSERT INTO expeditions_data VALUES (?, 0, false, now(), now())", $bindedValues = [$this->nick]);
		$this->query->updateBindValue("INSERT INTO rare_equipment VALUES (?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)", $bindedValues = [$this->nick]);
		$this->query->updateBindValue("INSERT INTO basic_equipment VALUES (?, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)", $bindedValues = [$this->nick]);
		$this->query->updateBindValue("INSERT INTO mines_data VALUES (?, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, now())", $bindedValues = [$this->nick]);
		$this->query->updateBindValue("INSERT INTO trips_data VALUES (?, 0, false, now(), now())", $bindedValues = [$this->nick]);
		$_SESSION['registration_succesful'] = true;		
		header ('Location: ../controllers/registration.php');
		exit();
	}
}


?>