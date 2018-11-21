<?php

session_start();

if(isset($_SESSION['logged'])){
	header('Location: ../controllers/equipment.php');
}

require '../classes/Login.php';

if (isset($_POST['login']) && ($_POST['password'])){
	Login::logIntoGame();
}

require '../sessions/login-sessions.php';
$loginFormSessions = new LoginSessions();

require '../views/login.php';