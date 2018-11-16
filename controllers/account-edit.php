<?php
	
	require_once '../views/partials/logged-checking.php';
	
	require '../classes/AccountEdit.php';
	
	if(isset($_POST['editNick'])){
	$nickEdit = new AccountEdit();
	$nickEdit->editNick();
	
	}
	if(isset($_POST['deleteNick'])){
		$deleteAccount = new AccountEdit();
		$deleteAccount->deleteAccount();
	}
			
	require '../sessions/account-sessions.php';
	$accountSession = new AccountSessions();

	require '../views/account-edit.php';	