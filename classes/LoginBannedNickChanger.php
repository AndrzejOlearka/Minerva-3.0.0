<?php

//skrypt pozwalający na logowanie się do gry
//script that allows to login into a game

require_once "../classes/LoginOperations.php";

class LoginBannedNickChanger extends LoginOperations{
	
	public function __construct(){
		parent::__construct();
		$this->nick = filter_input(INPUT_POST, 'newNick');		
	}
	
	private function abortBannedNickChanging(){
		if(isset($_POST['newNickAborted'])){
			session_unset();
			header('Location: ../controllers/login.php');
			exit();						
		}
		return true;
	}
	
	private function sanitazeNewNick(){
		if(empty($this->nick)){
			$_SESSION['e_changing_nick_exist'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Nie podałeś nowego nicka!</div><br />';	
			header('Location: ../controllers/login.php');
			exit();				
		}			
		if(!ctype_alnum($this->nick)){	
			$_SESSION['e_changing_nick_type'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!</div><br />';
			header('Location: ../controllers/login.php');
			exit();
		}
		return true;
	}
	
	private function validateNewNick(){
		if((strlen($this->nick)<5) || (strlen($this->nick)>20)){
			$_SESSION['e_changing_nick_length'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Nick musi posiadać od 5 do 20 znaków!</div><br />';
			header('Location: ../controllers/login.php');
			exit();				
		}
		return true;
	}
	
	private function checkUsersExist(){
		return $usersExist = $this->query->countRowsBindValue("SELECT user FROM user_data WHERE user  = ?", $bindedValues = [$this->nick]);
	}

	private function checkChangingAvailability(){
		if($this->checkUsersExist() == 0){
			return true;
		}
		$_SESSION['e_changing_nick_exist'] = '<br /><div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Istnieje już gracz z tym nickiem!</div><br />';	
		header('Location: ../controllers/login.php');
		exit();		
	}			
			
	public function changeBannedNick(){
		if($this->abortBannedNickChanging() && $this->sanitazeNewNick() && $this->validateNewNick() && $this->checkChangingAvailability()){
			$this->query->updateBindValue("UPDATE user_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['newNick'], $this->userName]);		
			$this->query->updateBindValue("UPDATE expeditions_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['newNick'], $this->userName]);			
			$this->query->updateBindValue("UPDATE trips_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['newNick'], $this->userName]);			
			$this->query->updateBindValue("UPDATE basic_equipment SET user = ? WHERE user = ?", $bindedValues = [$_POST['newNick'], $this->userName]);			
			$this->query->updateBindValue("UPDATE rare_equipment SET user = ? WHERE user = ?", $bindedValues = [$_POST['newNick'], $this->userName]);	
			$this->query->updateBindValue("UPDATE mines_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['newNick'], $this->userName]);	
			$this->query->updateBindValue("DELETE FROM banned_users WHERE user = ?", $bindedValues = [$this->userName]);					
								
			unset($_SESSION['change_nick_form']);
			unset($_SESSION['user']); 
			$_SESSION['log_banned_nick_changed'] = '<br /><div class="success col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Zmieniłeś swój niepoprawny nick i zlikwidowano twoją banicję!</div><br />';
			header('Location: ../controllers/login.php');
			exit();		
		}
	}
					
					
}



?>