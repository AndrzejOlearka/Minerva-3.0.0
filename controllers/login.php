<?php

session_start();

require '../sessions/login-sessions.php';
$loginFormSessions = new LoginSessions();

require '../views/login.php';