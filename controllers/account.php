<?php

	require_once '../views/partials/logged-checking.php';
	$updateLevel = require '../classes/level-update-server.php';
	
	require '../classes/account-server.php';
	require '../classes/account-premium.php';
	
	if(isset($_POST['premium'])){
		$premium = $_POST['premium'];
		$shop = new Shop();	
		$shop->getPremium($premium);
	}
	if(isset($_POST['coins'])){
		$coins = $_POST['coins'];	
		$shop = new Shop();	
		$shop->getCoins($coins);
	}		
	
		
	
	require '../sessions/account-sessions.php';
	$accountSession = new AccountSessions();

	require '../views/account.php';	

?>