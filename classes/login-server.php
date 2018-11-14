<?php

//skrypt pozwalający na logowanie się do gry
//script that allows to login into a game

session_start();

require_once '../core/database/connect.php';

if (isset($_POST['login']) && ($_POST['password'])){
		
	$login = filter_input(INPUT_POST, 'login');
	$password = filter_input(INPUT_POST, 'password');				

	$loginQuery = $dataBase->prepare("SELECT user, password FROM user_data WHERE user=:login");
	$loginQuery->bindValue(':login', $login, PDO::PARAM_STR);
	$loginQuery->execute();
	$usersExist = $loginQuery->rowCount();
	$loginData = $loginQuery->fetch();
	
	if ($usersExist==1){	
		
		if (password_verify($password, $loginData['password'])){				
			$_SESSION['logged']=true;		
			unset($_SESSION['e_form_login']);	
			
			$_SESSION['user'] = $loginData['user'];
			header('Location: ../controllers/equipment.php');
			exit();
		}			
		else{
			$_SESSION['e_form_login']='<div class="error col-12"><p>Nieprawidłowy login lub hasło!</p></div>';
			header('Location: login.php');
			exit();
		
		} 
	}	
	else{	
		$_SESSION['e_form_login']='<div class="error col-12"><p>Nieprawidłowy login lub hasło!</p></div>';	
		header('Location: login.php');
		exit();
	}
}		
else{
		$_SESSION['e_form_log_inputs'] = '<div class="error col-12"><p>Nie wypełniłeś wszystkich pól formularza logowania!</p></div><br /><br />';
		header ('Location: login.php');
		exit();
}
?>