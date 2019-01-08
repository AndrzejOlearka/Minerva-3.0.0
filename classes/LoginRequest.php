<?php

require_once "../classes/LoginOperations.php";

class LoginRequest extends LoginOperations{
	
	public function __construct(){
		parent::__construct();
		$this->login = filter_input(INPUT_POST, 'login');
		$this->password = filter_input(INPUT_POST, 'password');	
	}
	
	private function checkUsersExist(){
		return $usersExist = $this->query->countRowsBindValue("SELECT user FROM user_data WHERE user=?", $bindedValues = [$this->login]);
	}
	
	private function checkLoginAvailability(){
		if($this->checkUsersExist() == 1){
			return true;
		}
		$_SESSION['e_form_login']='<div class="error col-12">Nie istnieje użytkownik o podanym loginie!</div>';
		header('Location: ../controllers/login.php');
		exit();
	}
	
	private function sanitazePassword(){
		if(!empty($this->login) || !empty($this->password)){
			return true; 
		}
		$_SESSION['e_form_log_inputs'] = '<div class="error col-12">Nie wypełniłeś wszystkich pól formularza logowania!</div><br /><br />';
		header('Location: ../controllers/login.php');
		exit();
		
	}
	
	private function validatePassword(){
		$loginData = $this->query->selectBindValue("SELECT password FROM user_data WHERE user=?", $bindedValues = [$this->login]);
		if(password_verify($this->password, $loginData['password'])){
			return true;
		}
		$_SESSION['e_form_login']='<div class="error col-12">Nieprawidłowe hasło istniejącego użytkownika!</div>';
		header('Location: ../controllers/login.php');
		exit();
	}
	
	private function checkBanAccountStatus(){
		$usersExistOnBanList = $this->query->countRowsBindValue("SELECT user FROM banned_users WHERE user = ?", $bindedValues = [$this->login]);				
		if($usersExistOnBanList == 1){
			$this->checkBanType();
		}
		return false;
	}
	
	private function checkBanType(){
		$bannedData = $this->query->selectBindValue("SELECT * FROM banned_users WHERE user = ?", $bindedValues = [$this->login]);	
		$banEndTime = DateTime::createFromFormat('Y-m-d H:i:s', $bannedData['banning_date']);
		$banEndTime = $banEndTime->format('Y/m/d H:i:s');
		if($bannedData['nick_change_required'] == true){
			$_SESSION['change_nick_form'] = $this->getBanForm($banEndTime);
			$_SESSION['user'] = $this->login;		
			header('Location: ../controllers/login.php');
			exit();
		}
		else{
			$_SESSION['e_banned_account'] = '<div class="error col-12">UWAGA!!! Konto '.$this->login.' jest zbanowane do '.$banEndTime.'!</div>';
			header('Location: ../controllers/login.php');
			exit();
		}
	}
	
	private function checkModeratorStatus(){
		$usersExistAsModerator = $this->query->countRowsBindValue("SELECT user FROM moderators WHERE user = ?", $bindedValues = [$this->login]);				
		return ($usersExistAsModerator == 1) ? true : false;
	}
	
	private function checkAdminStatus(){
		 return ($this->login == 'admin') ? true : false;
	}
	
	public function logIntoNormalMode(){
		if($this->sanitazePassword() && $this->checkLoginAvailability() && $this->validatePassword() && $this->checkBanAccountStatus() == false && $this->checkModeratorStatus() == false){
			$_SESSION['user'] = $this->login;					
			unset($_SESSION['e_form_login']);	
			$_SESSION['logged'] = true;	
			unset($_SESSION['change_nick_form']);
			header('Location: ../controllers/equipment.php');
			exit();
		}
	}
	
	public function logIntoModeratorMode(){
		if($this->sanitazePassword() && $this->checkLoginAvailability() && $this->validatePassword() && $this->checkBanAccountStatus() == false && $this->checkModeratorStatus() == true){
			$_SESSION['user'] = $this->login;					
			unset($_SESSION['e_form_login']);	
			$_SESSION['moderator_mode'] = true;
			$_SESSION['logged'] = true;	
			unset($_SESSION['change_nick_form']);
			header('Location: ../controllers/admin.php');
			exit();
		}
	}
	
	public function logIntoAdminMode(){
		if(checkAdminStatus() && $this->sanitazePassword() && $this->validatePassword() == false){
			$_SESSION['user'] = $this->login;
			$_SESSION['logged']=true;
			$_SESSION['admin']=true;					
			header('Location: ../controllers/admin.php');
			exit();	
		}
	}
	
	public function logIntoGame(){
		$this->logIntoNormalMode();
		$this->logIntoModeratorMode();
		$this->logIntoAdminMode();
	}
}


?>