<?php

session_start();

require '../classes/Registration.php';
if (isset($_POST['nick']) && ($_POST['password']) && ($_POST['password2']) && ($_POST['email'])){
	Registration::register();	
}

require '../sessions/registration-sessions.php';
$registrationFormSession = new RegistrationSessions();

require_once '../views/registration.php';