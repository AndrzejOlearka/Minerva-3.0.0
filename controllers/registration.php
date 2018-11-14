<?php

session_start();

require_once '../sessions/registration-sessions.php';
$registrationFormSession = new RegistrationSessions();

require '../views/registration.php';