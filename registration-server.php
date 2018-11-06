<?php

session_start();

require_once 'database/connect.php';

if (isset($_POST['nick']) && ($_POST['password']) && ($_POST['password2']) && ($_POST['email'])){
		
		$flag = true;	
		$nick = filter_input(INPUT_POST, 'nick');
		
		if ((strlen($nick)<5) || (strlen($nick)>20)){
			$flag = false;	
			$_SESSION['e_nick_reg_length'] = '<div class="error col-12"><p>Nick musi posiadać od 5 do 20 znaków!</p></div>';
		}
		
		if (ctype_alnum($nick) == false){
			$flag = false;	
			$_SESSION['e_nick_reg_signs'] = '<div class="error col-12"><p>Nick może składać się tylko z liter i cyfr oraz nie może składać się z polskich znaków!</p></div>';
		}
		
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		
		if (empty($email)){
			$flag = false;	
			$_SESSION['e_email_reg_valid']='<div class="error col-12"><p>Podaj poprawny adres e-mail</p></div>';
		}
		
		$password = filter_input(INPUT_POST, 'password');
		$password2 = filter_input(INPUT_POST, 'password2');
		
		if((strlen($password) <5) || (strlen($password) > 20)){
			$flag = false;	
			$_SESSION['e_password_reg_length']='<div class="error col-12"><p>Hasło musi posiadać od 5 do 20 znaków!</p></div>';
		}
		
		if ($password != $password2){
			$flag = false;	
			$_SESSION['e_password_reg_equal']='<div class="error col-12"><p>Podane hasła nie są identyczne</p></div>';
		}
		
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		
		$idQuery = $dataBase->prepare ('SELECT id FROM user_data WHERE email = :email');
		$idQuery->bindValue(':email', $email, PDO::PARAM_STR);
		$idQuery->execute();
		$countEmails = $idQuery->rowCount();
		
		if ($countEmails > 0){
			$flag = false;	
			$_SESSION['e_email_reg_exist']='<div class="error col-12"><p>Istnieje już konto przypisane do tego adresu email!</p></div>';						
		}		
		
		$nickQuery = $dataBase->prepare('SELECT id FROM user_data WHERE user = :nick');
		$nickQuery->bindValue(':nick', $nick, PDO::PARAM_STR);
		$nickQuery->execute();
		$countEmails = $nickQuery->rowCount();
		
		if ($countEmails> 0){
			$flag = false;	
			$_SESSION['e_nick_reg_exist']='<div class="error col-12"><p>Istnieje już gracz o takim nicku, wybierz inny!</p></div>';					
		}		
		
		if ($flag == true){		
		
		$registerQuery = $dataBase->prepare("INSERT INTO user_data VALUES (NULL, :nick, '$passwordHash', :email, 1, 1, now() + INTERVAL 3 DAY, 5, 0)");
		$registerQuery->bindValue(':nick', $nick, PDO::PARAM_STR); 
		$registerQuery->bindValue(':email', $email, PDO::PARAM_STR);
		$registerQuery->execute();
		
		$registerQuery = $dataBase->prepare("INSERT INTO expeditions_data VALUES ('$nick', 0, false, now(), now())");
		$registerQuery->execute();
		
		$registerQuery = $dataBase->prepare("INSERT INTO rare_equipment VALUES ('$nick', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)"); 
		$registerQuery->execute();
		
		$registerQuery = $dataBase->prepare("INSERT INTO basic_equipment VALUES ('$nick', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
		$registerQuery->execute();
		
		$registerQuery = $dataBase->prepare("INSERT INTO mines_data VALUES ('$nick', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, now())");
		$registerQuery->execute();
		
		$registerQuery = $dataBase->prepare("INSERT INTO trips_data VALUES ('$nick', 0, false, now(), now())");
		$registerQuery->execute();
	
		$_SESSION['registration_succesful'] = true;
		}		
		header ('Location: registration.php');
		exit();
}
else
{
		$flag = false;	
		$_SESSION['e_form_reg_inputs'] = '<div class="error col-12"><p>Nie wypełniłeś wszystkich pól formularza rejestracji!</p></div><br /><br />';
		header ('Location: registration.php');
		exit();
}
?>