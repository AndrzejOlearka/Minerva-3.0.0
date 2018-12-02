<?php

session_start();

if(!isset($_SESSION['logged']) || isset($_SESSION['admin'])){
	header('Location: login.php');
}

?>