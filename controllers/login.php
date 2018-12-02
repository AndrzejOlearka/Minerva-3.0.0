<?php

session_start();

if(isset($_SESSION['logged']) && !isset($_SESSION['admin'])){
	header('Location: ../controllers/equipment.php');
}

require '../classes/Login.php';

if (isset($_POST['log'])){
	Login::logIntoGame();
}

if(isset($_POST['newNick'])){
	Login::changeBannedNick();
}
require '../sessions/login-sessions.php';
$loginFormSessions = new LoginSessions();

require '../views/login.php';