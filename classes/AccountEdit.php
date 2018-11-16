<?php

// obiekt pozwalający na edytowanie konta lub jego usunięcie 
// object that allows you to edit an account or delete it

class AccountEdit{

	public function editNick(){

		if(isset($_POST['editNick'])){
			$newNick = $_POST['nick'];
			$query = require '../core/bootstrap.php';
			$identicalNicks = $query->rows("SELECT id FROM user_data WHERE user = '$newNick'");

			if ((strlen($newNick)<5) || (strlen($newNick)>20)){
				$_SESSION['e_change_nick_length'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
					<p>Nick musi posiadać od 5 do 20 znaków!</p></div>';
				header ('Location: ../controllers/account.php');
				exit();
			}
			else if (ctype_alnum($newNick) == false){
				$_SESSION['e_change_nick_signs'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
					<p>Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!</p></div>';
				header ('Location: ../controllers/account.php');
				exit();

			}
			else if($identicalNicks > 0){
				$_SESSION['e_change_nick_identical'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
					<p>Istnieje użytkownik o podanym nicku!</p></div>';
				header ('Location: ../controllers/account.php');
				exit();
			}
			else{
				$query->update("UPDATE user_data SET user = '$newNick' WHERE user = '$userName'");
				$query->update("UPDATE basic_equipment SET user = '$newNick' WHERE user = '$userName'");
				$query->update("UPDATE rare_equipment SET user = '$newNick' WHERE user = '$userName'");
				$query->update("UPDATE expeditions_data SET user = '$newNick' WHERE user = '$userName'");
				$query->update("UPDATE trips_data SET user = '$newNick' WHERE user = '$userName'");
				$query->update("UPDATE mines_data SET user = '$newNick' WHERE user = '$userName'");

				$_SESSION['nick_change_success'] = '<div class="success col-10 col-lg-8 offset-1 offset-lg-2">
					Zmiana nicku przebiegła pomyślnie, od teraz nazywasz się '.$newNick.'!</div>';
				$newUser = $query->select("SELECT user FROM user_data WHERE user = '$newNick'");
				$newUser = $newUser['user'];
				$_SESSION['user'] = $newUser;
				header ('Location: ../controllers/account.php');
				exit();
			}
		}
	}

	public function deleteAccount(){

		if(isset($_POST['deleteNick'])){
			$query = require '../core/bootstrap.php';
			$query->update("DELETE FROM user_data WHERE user = '$userName'");
			$query->update("DELETE FROM basic_equipment WHERE user = '$userName'");
			$query->update("DELETE FROM rare_equipment WHERE user = '$userName'");
			$query->update("DELETE FROM expeditions_data WHERE user = '$userName'");
			$query->update("DELETE FROM trips_data WHERE user = '$userName'");
			$query->update("DELETE FROM mines_data WHERE user = '$userName'");
			$nick = $userName;
			session_unset();
			session_start();
			$_SESSION['deleted_account'] = '<div class="error col-10 col-lg-6 offset-1 offset-lg-3">
				<p>Usunąłeś konto '.$nick.'.</p></div>';
			header ('Location: ../index.php');
			exit();
		}
	}

}



?>
