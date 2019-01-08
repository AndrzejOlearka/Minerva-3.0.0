<?php

	require_once '../views/partials/logged-checking.php';

	require '../classes/ActionAccount.php';
	$actionAccount = new ActionAccount();
	$premiumTime = $actionAccount->showPremiumInfo();
	$actionAccount->buyPremium();
	$actionAccount->buyCoins();

	require '../sessions/account-sessions.php';
	$accountSession = new AccountSessions();
		
	require '../classes/Advance.php';
	Advance::updateLevel();
	
	require '../sessions/advance-sessions.php';
	$advance = new LevelUpdateSession();
	
	require '../classes/DataUser.php';

	require_once '../views/account.php';	

?>