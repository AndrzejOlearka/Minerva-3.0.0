<?php

	require_once '../views/partials/logged-checking.php';

	require '../classes/AccountPremiumInfo.php';
	$premiumTime = AccountPremiumInfo::getInfo();

	require_once '../classes/AccountShop.php';	
	if(isset($_POST['premium'])){
		$premium = $_POST['premium'];
		$shop = new AccountShop();	
		$shop->getPremium($premium);
	}
	if(isset($_POST['coins'])){
		$coins = $_POST['coins'];	
		$shop = new AccountShop();	
		$shop->getCoins($coins);
	}		

	require '../sessions/account-sessions.php';
	$accountSession = new AccountSessions();
		
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	$query = require '../core/bootstrap.php';
	$data = $query->select("SELECT * FROM user_data WHERE user = '$userName'");
	
	require '../classes/DataUser.php';

	require_once '../views/account.php';	

?>