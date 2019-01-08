<?php

require_once "../classes/Actions.php";
require '../classes/Stats.php';
require '../classes/SearchUser.php';

	class ActionStatistics extends Statistics{

		public function showStats(){
			$Stats = new Stats();
			$ExpStats = $Stats->showExpStats();
			$Coins = $Stats->showCoinsStats();
			$GuildStats = $Stats->showGuildsStats();
			return [$ExpStats, $Coins, $GuildStats];
		}
		public function searchUser(){
			if(isset($_POST['nick'])){
				$searchUser = new SearchUser();	
				$validation = $searchUser->initiateUserSearching();
				if($validation == true){
					return $searchUserResult = $searchUser->finalizeUserSearching();
				}
			}
		}
	}

?>
