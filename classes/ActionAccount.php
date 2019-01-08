<?php

require_once "../classes/Actions.php";
require '../classes/AccountEditor.php';
require '../classes/AccountPremiumInformator.php';
require '../classes/AccountShop.php';

class ActionAccount extends Account{

	public function editAccount(){
		if(isset($_POST['editNick'])){
			$accountEditor = new AccountEditor();
			$validation = $accountEditor->initiateNickEditing();
			if($validation == true){
				$accountEditor->finalizeNickEditing();
			}
		}
		if(isset($_POST['deleteNick'])){
			$accountEditor = new AccountEditor();
			$accountEditor->deleteAccount();
		}
	}
	
	public function showPremiumInfo(){
		$accountInformator = new AccountPremiumInformator();
		return $premiumInfo = $accountInformator->getPremiumInfo();	
	}
	
	public function buyPremium(){
		if(isset($_POST['premium'])){
			$shop = new AccountShop();	
			$shop->getPremium($_POST['premium']);
		}
	}
	
	public function buyCoins(){
		if(isset($_POST['coins'])){
			$shop = new AccountShop();	
			$shop->getCoins($_POST['coins']);
		}		
	}
}




?>
