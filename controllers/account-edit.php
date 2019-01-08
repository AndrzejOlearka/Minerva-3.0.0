<?php
	
	require_once '../views/partials/logged-checking.php';
	
	require '../classes/ActionAccount.php';
	$AccountEditor = new ActionAccount();
	$AccountEditor->editAccount();

			
	require '../sessions/account-sessions.php';
	$accountSession = new AccountSessions();

	require '../views/account-edit.php';	