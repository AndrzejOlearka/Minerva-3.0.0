<?php

session_start();

if(isset($_SESSION['logged']) && !isset($_SESSION['admin'])){
	header('Location: ../controllers/equipment.php');
}
require '../classes/ActionLogin.php';
$login = new ActionLogin();
$login->login();
$login->changeBannedNick();

require '../sessions/login-sessions.php';
$loginFormSessions = new LoginSessions();

require '../views/login.php';