<?php

session_start();

require '../classes/Registration.php';
if (isset($_POST['register'])){
	Registration::register();	
}

require '../sessions/registration-sessions.php';
$registrationFormSession = new RegistrationSessions();

require_once '../views/registration.php';