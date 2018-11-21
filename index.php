<?php

session_start();

if(isset($_SESSION['logged'])){
	header('Location: controllers/equipment.php');
}

require_once 'views/index.php';

?>

