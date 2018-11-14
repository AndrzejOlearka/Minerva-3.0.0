<?php

// skrypy pozwalający na wylogowanie się z gry
// script that allows to logout from game

	session_start();
	session_unset();
	header('Location: ../controllers/login.php');

?>
