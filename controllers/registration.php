<?php

session_start();

require '../classes/Registration.php';
if (isset($_POST['nick']) && ($_POST['password']) && ($_POST['password2']) && ($_POST['email'])){
	Registration::register();	
}

require_once '../sessions/registration-sessions.php';
$registrationFormSession = new RegistrationSessions();

require '../views/registration.php';