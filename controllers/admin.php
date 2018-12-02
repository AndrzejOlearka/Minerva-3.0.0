<?php

session_start();

require_once '../classes/Admin.php';
$admin = new Admin();

if(isset($_POST['banning'])){
$accountBan = $_POST['banning'];
$admin->banAccount($accountBan);
}
if(isset($_POST['unbanning'])){
$accountBan = $_POST['unbanning'];
$admin->unbanAccount($accountBan);
}
if(isset($_POST['deleting'])){
$accountDelete = $_POST['deleting'];
$admin->deleteAccount($accountDelete);
}
if(isset($_POST['changing'])){
$nickChange = $_POST['changing'];
$admin->banUserNick($nickChange);
}

require '../classes/Stats.php';
if(isset($_POST['nick'])){
	$searchUser = new Stats();
}

require_once '../views/admin.php';


?>
