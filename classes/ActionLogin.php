<?php

require_once "../classes/Actions.php";
require '../classes/LoginRequest.php';
require '../classes/LoginBannedNickChanger.php';

class ActionLogin extends LoginPanel{

	public function login(){
		if(isset($_POST['login']) && isset($_POST['password'])){
			$login = new LoginRequest();
			$login->logIntoGame();
		}
	}
	public function changeBannedNick(){
		if(isset($_POST['newNick'])){
			$changer = new LoginBannedNickChanger();
			$changer->changeBannedNick();
		}
	}
	
	
}


?>
