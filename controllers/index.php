<?php

session_start();

if(isset($_SESSION['logged'])){
	header('Location: equipment.php');
}

require 'index.php';