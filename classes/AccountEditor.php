<?php

// obiekt pozwalający na edytowanie konta lub jego usunięcie 
// object that allows you to edit an account or delete it

require "../classes/AccountOperations.php";

class AccountEditor extends AccountOperations{

	private function sanitazeEditingNick(){
		 if (ctype_alnum($_POST['nick']) == false){
			$_SESSION['e_change_nick_signs'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
				<p>Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!</p></div>';
			header ('Location: ../controllers/account.php');
			exit();
		}
		return true;
	}
	
	private function validateEditingNick(){
		$newNick = $_POST['nick'];
		$identicalNicks = $this->query->rows("SELECT id FROM user_data WHERE user = '$newNick'");
		if ((strlen($newNick)<5) || (strlen($newNick)>20)){
			$_SESSION['e_change_nick_length'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
				<p>Nick musi posiadać od 5 do 20 znaków!</p></div>';
			header ('Location: ../controllers/account.php');
			exit();		
		}		
		else{
			if($identicalNicks > 0){
			$_SESSION['e_change_nick_identical'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
				<p>Istnieje użytkownik o podanym nicku!</p></div>';
			header ('Location: ../controllers/account.php');
			exit();
			}
			return true;
		}
	}
		
	public function initiateNickEditing(){
		if($this->sanitazeEditingNick() == true && $this->validateEditingNick() == true){
			return true; 
		}
	}

	
	public function FinalizeNickEditing(){

		$this->query->updateBindValue("UPDATE user_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['nick'], $this->userName]);
		$this->query->updateBindValue("UPDATE basic_equipment SET user = ? WHERE user = ?", $bindedValues = [$_POST['nick'], $this->userName]);
		$this->query->updateBindValue("UPDATE rare_equipment SET user = ? WHERE user = ?", $bindedValues = [$_POST['nick'], $this->userName]);
		$this->query->updateBindValue("UPDATE expeditions_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['nick'], $this->userName]);
		$this->query->updateBindValue("UPDATE trips_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['nick'], $this->userName]);
		$this->query->updateBindValue("UPDATE mines_data SET user = ? WHERE user = ?", $bindedValues = [$_POST['nick'], $this->userName]);

		$_SESSION['nick_change_success'] = '<div class="success col-10 col-lg-8 offset-1 offset-lg-2">
			Zmiana nicku przebiegła pomyślnie, od teraz nazywasz się '.$_POST['nick'].'!</div>';
		$this->userName = $oldNick;
		$newUserName = $this->query->selectBindValue("SELECT user FROM user_data WHERE user = ?", $bindedValues = [$oldNick]);
		$newUserName = $newUserName['user'];
		$_SESSION['user'] = $newUserName;
		header ('Location: ../controllers/account.php');
		exit();

	}

	public function deleteAccount(){

		if(isset($_POST['deleteNick'])){
			$this->query = require '../core/bootstrap.php';
			$this->query->updateBindValue("DELETE FROM user_data WHERE user = ?", $bindedValues = [$this->userName]);
			$this->query->updateBindValue("DELETE FROM basic_equipment WHERE user = ?", $bindedValues = [$this->userName]);
			$this->query->updateBindValue("DELETE FROM rare_equipment WHERE user = ?", $bindedValues = [$this->userName]);
			$this->query->updateBindValue("DELETE FROM expeditions_data WHERE user = ?", $bindedValues = [$this->userName]);
			$this->query->updateBindValue("DELETE FROM trips_data WHERE user = ?", $bindedValues = [$this->userName]);
			$this->query->updateBindValue("DELETE FROM mines_data WHERE user = ?", $bindedValues = [$this->userName]);
			$nick = $this->userName;
			session_unset();
			session_start();
			$_SESSION['deleted_account'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
				Usunąłeś konto '.$nick.'.</div>';
			header ('Location: ../index.php');
			exit();
		}
	}

}



?>
