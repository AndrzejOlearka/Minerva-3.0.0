<?php

require_once "../classes/Actions.php";
require '../classes/GuildCreator.php';
require '../classes/GuildMemberEditor.php';
require '../classes/GuildLeaderEditor.php';
require '../classes/GuildList.php';

class ActionGuild extends Guilds{

	public function showGuilds(){
		 $newGuildList = new GuildList();
		 $newGuildList->showGuilds();
	}
	
	public function createGuild(){
		if(isset($_POST['guildName'])){
			$newGuild = new GuildCreator();
			$validation = $newGuild->initiateGuildCreating();
			if($validation == true){
				$newGuild->finalizeGuildCreating();
			}
		}		
	}
	
	public function editGuildMemberMode(){
		$guildMemberEditor = new GuildMemberEditor();
		$validation = $guildMemberEditor->validateGuildJoining();
		if($validation == true){
			$guildEditor->joinGuild();
		}
		$validation = $guildMemberEditor->validateGuildLeaving();
		if($validation == true){
			$guildEditor->leaveGuild();
		}			
	}

	public function editGuildLeaderMode(){
		if(isset($_POST['guildDescription'])){
			$newDescription = new GuildLeaderEditor();
			$validation = $newDescription->validateNewDescription();
			if($validation == true){
				$newDescription->changeGuildDescription();
			}				
		}							
		if(isset($_POST['guildLeader'])){				
			$newLeader = new GuildLeaderEditor();
			$validation = $newLeader->validateNewLeader();
			if($validation == true){
				$newLeader->changeGuildLeader();
			}				
		}
		$guildEditor = new GuildLeaderEditor();
		$validation = $guildEditor->validateGuildDeleting();
		if($validation == true){
			$guildEditor->deleteGuild();
		}	
	}
}


?>
