<?php

session_start();

require '../classes/login.php';

if (isset($_POST['login']) && ($_POST['password'])){
	Login::logIntoGame();
}

require '../sessions/login-sessions.php';
$loginFormSessions = new LoginSessions();

require '../views/login.php';