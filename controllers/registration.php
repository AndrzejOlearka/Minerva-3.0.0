<?php

session_start();

require '../classes/ActionRegistration.php';
$registration = new ActionRegistration();
$registration->register();

require '../sessions/registration-sessions.php';
$registrationFormSession = new RegistrationSessions();

require_once '../views/registration.php';